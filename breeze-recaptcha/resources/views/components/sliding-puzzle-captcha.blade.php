@props(['name' => 'captcha_puzzle'])

<div class="mt-4 captcha-puzzle">
    <div class="mb-3">
        <p class="text-sm font-medium text-gray-700">{{ __('Verify you are human') }}</p>
    </div>
    
    <div class="puzzle-container relative bg-gray-100 rounded-lg overflow-hidden" style="width: 300px; height: 200px;">
        <img id="puzzle-main" src="" alt="Puzzle" class="w-full h-full object-cover" />
        <div class="puzzle-piece-container absolute top-0" id="piece-container" style="width: 50px; height: 200px; cursor: grab;">
            <img id="puzzle-piece" src="" alt="Puzzle Piece" class="w-full h-full object-cover border-2 border-blue-500" />
        </div>
    </div>

    <div class="mt-3">
        <input type="range" id="puzzle-slider" min="0" max="300" value="0" class="w-full" />
        <p class="text-xs text-gray-500 mt-1">{{ __('Drag the piece to match the puzzle') }}</p>
    </div>

    <div class="mt-3 flex gap-2">
        <button type="button" id="verify-btn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
            {{ __('Verify') }}
        </button>
        <button type="button" id="refresh-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 text-sm">
            {{ __('Refresh') }}
        </button>
    </div>

    <div id="puzzle-message" class="mt-2 hidden text-sm"></div>
    
    <input type="hidden" id="{{ $name }}" name="{{ $name }}" value="0" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('puzzle-slider');
            const container = document.getElementById('piece-container');
            const mainImg = document.getElementById('puzzle-main');
            const pieceImg = document.getElementById('puzzle-piece');
            const verifyBtn = document.getElementById('verify-btn');
            const refreshBtn = document.getElementById('refresh-btn');
            const message = document.getElementById('puzzle-message');
            const hiddenInput = document.getElementById('{{ $name }}');
            let puzzleWidth = 300;
            let pieceWidth = 50;

            async function loadPuzzle() {
                try {
                    const response = await fetch('{{ route("sliding-puzzle.generate") }}');
                    const data = await response.json();
                    
                    mainImg.src = data.main_image;
                    pieceImg.src = data.piece_image;
                    puzzleWidth = data.puzzle_width;
                    pieceWidth = data.piece_width;
                    
                    slider.max = puzzleWidth - pieceWidth;
                    slider.value = 0;
                    updatePiecePosition(0);
                    
                    message.classList.add('hidden');
                    hiddenInput.value = '0';
                } catch (error) {
                    console.error('Error loading puzzle:', error);
                    message.textContent = 'Error loading puzzle';
                    message.classList.remove('hidden');
                    message.classList.add('text-red-500');
                }
            }

            function updatePiecePosition(x) {
                container.style.left = x + 'px';
                hiddenInput.value = x;
            }

            slider.addEventListener('input', function() {
                updatePiecePosition(parseInt(this.value));
            });

            verifyBtn.addEventListener('click', async function() {
                const x = parseInt(slider.value);
                
                try {
                    const response = await fetch('{{ route("sliding-puzzle.verify") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ x: x })
                    });

                    if (response.ok) {
                        message.textContent = '✓ Verification successful!';
                        message.classList.remove('hidden', 'text-red-500');
                        message.classList.add('text-green-500');
                        verifyBtn.disabled = true;
                        slider.disabled = true;
                    } else {
                        message.textContent = '✗ Incorrect position. Try again.';
                        message.classList.remove('hidden', 'text-green-500');
                        message.classList.add('text-red-500');
                    }
                } catch (error) {
                    console.error('Error verifying puzzle:', error);
                    message.textContent = 'Error verifying puzzle';
                    message.classList.remove('hidden', 'text-green-500');
                    message.classList.add('text-red-500');
                }
            });

            refreshBtn.addEventListener('click', loadPuzzle);

            // Load puzzle on init
            loadPuzzle();
        });
    </script>
</div>
