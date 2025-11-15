<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">{{ $mealKit->name }}</h2>
                <p class="text-sm text-yellow-600 font-semibold">Premium Culinary Experience</p>
            </div>
            <a href="{{ route('meal-kits.edit', $mealKit->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-semibold">✏️ Edit</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Image & Details Column -->
                <div class="lg:col-span-2">
                    <div class="card-luxury rounded-2xl overflow-hidden mb-8">
                        @if($mealKit->image_url)
                            <img src="{{ $mealKit->image_url }}" alt="{{ $mealKit->name }}" class="w-full h-96 object-cover rounded-2xl">
                        @else
                            <div class="w-full h-96 bg-gradient-to-r from-yellow-300 to-orange-400 rounded-2xl flex items-center justify-center">
                                <span class="text-white text-2xl font-semibold">🍽️ {{ $mealKit->name }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($mealKit->description)
                        <div class="card-luxury rounded-2xl p-8 mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">About This Meal</h3>
                            <p class="text-gray-700 text-lg leading-relaxed">{{ $mealKit->description }}</p>
                        </div>
                    @endif

                    <!-- Ingredients -->
                    @if($mealKit->ingredients)
                        <div class="card-luxury rounded-2xl p-8 mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">🥘 Ingredients</h3>
                            @php
                                $ingredients = is_string($mealKit->ingredients) ? json_decode($mealKit->ingredients, true) : $mealKit->ingredients;
                                if (is_string($ingredients)) {
                                    $ingredients = array_filter(array_map('trim', explode(',', $ingredients)));
                                }
                            @endphp
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                @foreach($ingredients as $ingredient)
                                    <li class="flex items-center text-gray-700">
                                        <span class="text-yellow-500 mr-3">✓</span>
                                        {{ is_array($ingredient) ? $ingredient : $ingredient }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Instructions -->
                    @if($mealKit->instructions)
                        <div class="card-luxury rounded-2xl p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">👨‍🍳 Cooking Instructions</h3>
                            @php
                                $instructions = is_string($mealKit->instructions) ? json_decode($mealKit->instructions, true) : $mealKit->instructions;
                                if (is_string($instructions)) {
                                    $instructions = array_filter(array_map('trim', explode(',', $instructions)));
                                }
                            @endphp
                            <ol class="space-y-3">
                                @foreach($instructions as $index => $instruction)
                                    <li class="flex gap-4 text-gray-700">
                                        <span class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-r from-yellow-500 to-orange-500 text-white flex items-center justify-center font-bold">{{ $index + 1 }}</span>
                                        <span>{{ is_array($instruction) ? $instruction : $instruction }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="card-luxury rounded-2xl p-8 sticky top-20 mb-8">
                        <!-- Price -->
                        <div class="mb-6">
                            <p class="text-sm text-gray-600 font-semibold mb-1">PRICE</p>
                            <p class="premium-price text-4xl">${{ number_format($mealKit->price, 2) }}</p>
                        </div>

                        <!-- Cuisine -->
                        <div class="mb-6 pb-6 border-b border-gray-200">
                            <span class="cuisine-badge px-4 py-2 rounded-full">{{ $mealKit->cuisine_type ?? 'Fusion' }}</span>
                        </div>

                        <!-- Details Grid -->
                        <div class="space-y-4 mb-8 pb-8 border-b border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Servings</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $mealKit->servings }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Prep Time</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $mealKit->prep_time }} min</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Stock Available</p>
                                <p class="text-2xl font-bold {{ $mealKit->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $mealKit->stock }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Status</p>
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-bold {{ $mealKit->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $mealKit->is_available ? '✓ Available' : '✗ Unavailable' }}
                                </span>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="type" value="meal_kit">
                            <input type="hidden" name="id" value="{{ $mealKit->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-bold hover:shadow-lg transition-all mb-3">
                                🛒 Add to Cart
                            </button>
                        </form>

                        <!-- Quick Checkout -->
                        <form action="{{ route('cart.add') }}" method="POST" class="mb-4" data-checkout-url="{{ route('checkout.checkout') }}" onsubmit="handleCheckout(event)">
                            @csrf
                            <input type="hidden" name="type" value="meal_kit">
                            <input type="hidden" name="id" value="{{ $mealKit->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                                ⚡ Buy Now
                            </button>
                        </form>
                        <script>
                            function handleCheckout(event) {
                                event.preventDefault();
                                const form = event.target;
                                const checkoutUrl = form.getAttribute('data-checkout-url');
                                form.submit();
                                setTimeout(() => {
                                    window.location.href = checkoutUrl;
                                }, 200);
                            }
                        </script>

                        <!-- Back Button -->
                        <a href="{{ route('meal-kits.index') }}" class="w-full block text-center px-6 py-2 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:border-gray-500">
                            ← Back to Meals
                        </a>
                    </div>
                </div>
            </div>

                    <!-- Description -->
                    @if($mealKit->description)
                        <div class="mt-8 pt-8 border-t">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Description</h4>
                            <p class="text-gray-700">{{ $mealKit->description }}</p>
                        </div>
                    @endif

                    <!-- Ingredients -->
                    @if($mealKit->ingredients)
                        <div class="mt-6 pt-6 border-t">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Ingredients</h4>
                            <ul class="list-disc list-inside text-gray-700">
                                @foreach(explode(',', $mealKit->ingredients) as $ingredient)
                                    <li>{{ trim($ingredient) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Instructions -->
                    @if($mealKit->instructions)
                        <div class="mt-6 pt-6 border-t">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Cooking Instructions</h4>
                            <p class="text-gray-700 whitespace-pre-line">{{ $mealKit->instructions }}</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
