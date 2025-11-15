<div
    x-data="slidingPuzzle"
    x-init="init"
    class="w-full max-w-sm mx-auto"
>
    <div class="relative h-[60px] bg-gray-100 rounded-lg overflow-hidden mb-2">
        <!-- Background pattern -->
        <div class="absolute inset-0 flex">
            @for ($i = 1; $i <= 6; $i++)
                <div class="w-[50px] h-full border-r border-gray-200 flex items-center justify-center text-gray-400">
                    {{ $i }}
                </div>
            @endfor
        </div>
        
        <!-- Sliding piece -->
        <div
            x-ref="slider"
            @mousedown="startDragging"
            @touchstart="startDragging"
            :style="{ transform: `translateX(${position}px)` }"
            class="absolute top-0 left-0 w-[50px] h-full bg-blue-500 cursor-pointer rounded transition-shadow duration-200 hover:shadow-lg"
        >
            <div class="w-full h-full flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Verification status -->
    <div x-show="verified" class="text-green-500 text-sm text-center">
        Verification successful!
    </div>
    <div x-show="error" class="text-red-500 text-sm text-center" x-text="error">
    </div>

    <!-- Hidden input to store verification token -->
    <input type="hidden" name="puzzle_verification_token" x-model="token">
</div>

@push('scripts')
<script>
console.log('Puzzle script loaded, Alpine available:', typeof Alpine !== 'undefined');

// Wait for Alpine to be available before registering
function registerPuzzleComponent() {
    if (typeof Alpine === 'undefined') {
        setTimeout(registerPuzzleComponent, 50);
        return;
    }
    
    console.log('Alpine is ready, registering slidingPuzzle component');
    Alpine.data('slidingPuzzle', () => ({
        position: 0,
        isDragging: false,
        startX: 0,
        token: '',
        verified: false,
        error: '',
        puzzleSize: 300,
        pieceSize: 50,
        
        init() {
            this.generatePuzzle();
            
            // Global mouse/touch event handlers
            document.addEventListener('mousemove', (e) => this.onDrag(e));
            document.addEventListener('mouseup', () => this.stopDragging());
            document.addEventListener('touchmove', (e) => this.onDrag(e));
            document.addEventListener('touchend', () => this.stopDragging());
        },

        async generatePuzzle() {
            try {
                const response = await fetch('/sliding-puzzle/generate', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                if (!response.ok) throw new Error('Failed to generate puzzle');
                const data = await response.json();
                this.token = data.token;
                this.position = data.initialPosition;
                this.puzzleSize = data.puzzleSize;
                this.pieceSize = data.pieceSize;
                this.verified = false;
                this.error = '';
            } catch (err) {
                console.error('Puzzle generation error:', err);
                this.error = 'Failed to generate puzzle';
            }
        },

        startDragging(e) {
            if (this.verified) return;
            
            this.isDragging = true;
            this.startX = e.type === 'mousedown' ? 
                e.pageX - this.position : 
                e.touches[0].pageX - this.position;
        },

        onDrag(e) {
            if (!this.isDragging || this.verified) return;

            const currentX = e.type === 'mousemove' ? e.pageX : e.touches[0].pageX;
            let newPosition = currentX - this.startX;

            // Constrain movement
            newPosition = Math.max(0, Math.min(newPosition, this.puzzleSize - this.pieceSize));
            this.position = newPosition;
        },

        async stopDragging() {
            if (!this.isDragging || this.verified) return;
            
            this.isDragging = false;

            // Verify position
            try {
                const response = await fetch('/sliding-puzzle/verify', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        token: this.token,
                        position: this.position
                    })
                });

                const data = await response.json();
                
                if (data.valid) {
                    this.verified = true;
                    this.error = '';
                } else {
                    this.error = 'Incorrect position. Try again.';
                    await this.generatePuzzle(); // Reset puzzle
                }
            } catch (err) {
                console.error('Verification error:', err);
                this.error = 'Verification failed. Please try again.';
                await this.generatePuzzle();
            }
        }
    }));
}

// Call the registration function
registerPuzzleComponent();
</script>
@endpush