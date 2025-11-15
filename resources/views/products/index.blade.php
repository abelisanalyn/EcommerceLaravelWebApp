<x-app-layout>
    <div class="min-h-screen">
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                    <h2 class="section-title mb-1">Premium Meal Products</h2>
                    <p class="text-sm text-yellow-600 font-semibold">✨ Handpicked Culinary Excellence ✨</p>
                </div>
                <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">+ New Product</a>
            </div>
        </x-slot>

        <div class="py-16">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-8 p-4 bg-gradient-to-r from-green-400 to-emerald-400 text-white rounded-lg shadow-lg border border-green-300 backdrop-blur">
                        <span class="font-semibold">✓ {{ session('success') }}</span>
                    </div>
                @endif

                <div class="mb-8">
                    <p class="text-center text-gray-600 text-sm uppercase tracking-widest font-semibold">Our Exclusive Meal Selection</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                    @forelse ($products as $product)
                        <div class="card-luxury rounded-2xl overflow-hidden group">
                            <div class="meal-image h-48 overflow-hidden relative bg-gradient-to-br from-gray-200 to-gray-300">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-r from-yellow-300 to-yellow-500 flex items-center justify-center">
                                        <span class="text-white font-semibold text-center px-4 text-sm">🍽️ {{ $product->name }}</span>
                                    </div>
                                @endif
                                @if($product->stock <= 5)
                                    <div class="absolute top-2 right-2 premium-badge px-3 py-1 rounded-full text-xs">LIMITED</div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <h3 class="font-bold text-base text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors">{{ $product->name }}</h3>
                                @if($product->category)
                                    <p class="text-xs text-blue-600 font-semibold mb-2">📁 {{ $product->category->name }}</p>
                                @endif
                                <p class="text-xs text-gray-600 mb-4 line-clamp-2 leading-relaxed">{{ $product->description }}</p>
                                
                                <div class="mb-4">
                                    <div class="flex justify-between items-baseline mb-2">
                                        <span class="premium-price text-base">${{ number_format($product->price, 2) }}</span>
                                        <span class="cuisine-badge px-3 py-1 rounded-full text-xs">{{ $product->cuisine_type ?? 'Premium' }}</span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-2 text-center text-xs text-gray-600 mb-4 p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold text-gray-800">🍽️</p>
                                        <p class="text-xs">{{ $product->servings ?? 2 }} servings</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">⏱️</p>
                                        <p class="text-xs">{{ $product->prep_time ?? 30 }}m</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">📦</p>
                                        <p class="text-xs {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-bold">{{ $product->stock }}</p>
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="flex-1 text-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg text-xs font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">View Details</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 text-center px-3 py-2 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg text-xs font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Remove this meal?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-xs font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <div class="text-6xl mb-4 animate-bounce">🍽️</div>
                            <p class="text-gray-700 text-lg font-semibold">No meals available yet.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
