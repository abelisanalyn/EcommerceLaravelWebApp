<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">Culinary Excellence</h2>
                <p class="text-sm text-yellow-600 font-semibold tracking-wider">✨ Tasteful or Tender - Premium Meal Kits ✨</p>
            </div>
            <a href="{{ route('meal-kits.create') }}" class="animated-btn">
                <x-primary-button class="shadow-lg">
                    {{ __('+ Create New Meal') }}
                </x-primary-button>
            </a>
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
                <p class="text-center text-gray-600 text-sm uppercase tracking-widest font-semibold">Our Premium Selection</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @forelse ($mealKits as $kit)
                    <div class="card-luxury rounded-2xl overflow-hidden group">
                        <div class="meal-image h-40 overflow-hidden relative bg-gradient-to-br from-gray-200 to-gray-300">
                            @if($kit->image_url)
                                <img src="{{ $kit->image_url }}" alt="{{ $kit->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-r from-yellow-300 to-yellow-500 flex items-center justify-center">
                                    <span class="text-white font-semibold">Premium Cuisine</span>
                                </div>
                            @endif
                            @if($kit->stock <= 5)
                                <div class="absolute top-2 right-2 premium-badge px-3 py-1 rounded-full text-xs">LIMITED</div>
                            @endif
                        </div>
                        
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors">{{ $kit->name }}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">{{ $kit->description }}</p>
                            
                            <div class="mb-4">
                                <div class="flex justify-between items-baseline mb-2">
                                    <span class="premium-price">${{ number_format($kit->price, 2) }}</span>
                                    <span class="cuisine-badge px-3 py-1 rounded-full text-xs">{{ $kit->cuisine_type ?? 'Fusion' }}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-2 text-center text-xs text-gray-600 mb-4 p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800">🍽️</p>
                                    <p>{{ $kit->servings }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">⏱️</p>
                                    <p>{{ $kit->prep_time }}m</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">📦</p>
                                    <p class="{{ $kit->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-bold">{{ $kit->stock }}</p>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('meal-kits.show', $kit->id) }}" class="flex-1 text-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">View</a>
                                <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="type" value="meal_kit">
                                    <input type="hidden" name="id" value="{{ $kit->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">🛒 Add</button>
                                </form>
                                <a href="{{ route('meal-kits.edit', $kit->id) }}" class="flex-1 text-center px-3 py-2 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">Edit</a>
                                <form action="{{ route('meal-kits.destroy', $kit->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Remove this culinary masterpiece?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="text-6xl mb-4">🍽️</div>
                        <p class="text-gray-700 text-lg font-semibold">No culinary creations yet. Let's build your menu!</p>
                        <a href="{{ route('meal-kits.create') }}" class="inline-block mt-6 px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                            Create Your First Masterpiece
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $mealKits->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
