<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">{{ $product->name }}</h2>
                <p class="text-sm text-yellow-600 font-semibold">{{ $product->cuisine_type ?? 'Premium Meal' }}</p>
            </div>
            <div class="flex gap-4 items-center">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-semibold">✏️ Edit</a>
                <a href="{{ route('shop.index') }}" class="text-yellow-600 hover:text-yellow-700 font-semibold">← Back to Shop</a>
            </div>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="card-luxury rounded-2xl overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                    <!-- Image -->
                    <div>
                        <div class="meal-image h-96 overflow-hidden rounded-xl relative bg-gradient-to-br from-gray-200 to-gray-300">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-r from-yellow-300 to-yellow-500 flex items-center justify-center">
                                    <span class="text-white font-semibold text-2xl">🍽️</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Details -->
                    <div>
                        <div class="mb-6">
                            <p class="text-sm text-gray-600 uppercase tracking-widest font-semibold mb-2">Premium Meal</p>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>

                        <!-- Price & Stock -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="card-luxury p-4 rounded-xl">
                                <p class="text-gray-600 text-sm font-semibold mb-1">Price</p>
                                <p class="premium-price">${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="card-luxury p-4 rounded-xl">
                                <p class="text-gray-600 text-sm font-semibold mb-1">In Stock</p>
                                <p class="text-2xl font-bold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $product->stock }}</p>
                            </div>
                        </div>

                        <!-- Meal Details -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="card-luxury p-4 rounded-xl text-center">
                                <p class="text-2xl mb-1">🍽️</p>
                                <p class="text-xs text-gray-600">Servings</p>
                                <p class="font-bold text-lg">{{ $product->servings ?? 2 }}</p>
                            </div>
                            <div class="card-luxury p-4 rounded-xl text-center">
                                <p class="text-2xl mb-1">⏱️</p>
                                <p class="text-xs text-gray-600">Prep Time</p>
                                <p class="font-bold text-lg">{{ $product->prep_time ?? 30 }}m</p>
                            </div>
                            <div class="card-luxury p-4 rounded-xl text-center">
                                <p class="text-2xl mb-1">🍴</p>
                                <p class="text-xs text-gray-600">Cuisine</p>
                                <p class="font-bold text-sm">{{ $product->cuisine_type ?? 'Premium' }}</p>
                            </div>
                        </div>

                        <!-- Ingredients -->
                        @if($product->ingredients)
                            <div class="mb-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-3">Ingredients</h3>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <ul class="space-y-2">
                                        @foreach(json_decode($product->ingredients) as $ingredient)
                                            <li class="text-sm text-gray-700 flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                                                {{ $ingredient }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- Instructions -->
                        @if($product->instructions)
                            <div class="mb-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-3">Preparation</h3>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <ol class="space-y-2">
                                        @foreach(json_decode($product->instructions) as $index => $instruction)
                                            <li class="text-sm text-gray-700 flex gap-3">
                                                <span class="font-bold text-yellow-600 w-6">{{ $index + 1 }}.</span>
                                                <span>{{ $instruction }}</span>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
