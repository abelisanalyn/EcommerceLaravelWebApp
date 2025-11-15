<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
    <!-- Product Image -->
    <div class="h-48 bg-gradient-to-br from-yellow-300 to-yellow-500 flex items-center justify-center overflow-hidden relative">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <span class="text-white font-semibold text-center px-4 text-sm">🍽️ {{ $product->name }}</span>
        @endif
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-1">{{ $product->name }}</h3>
        
        @if($product->category)
            <p class="text-sm text-blue-600 font-semibold mb-2">📁 {{ $product->category->name }}</p>
        @endif

        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>

        <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-bold text-yellow-600">${{ number_format($product->price, 2) }}</span>
            <span class="text-xs font-semibold px-2 py-1 rounded {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $product->stock > 0 ? "Stock: $product->stock" : 'Out of Stock' }}
            </span>
        </div>

        @if($product->stock > 0)
            <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2 mb-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 border border-gray-300 rounded px-2 py-2 text-center text-sm">
                <button type="submit" class="flex-1 bg-yellow-600 text-white font-semibold py-2 rounded-lg hover:bg-yellow-700 transition-colors text-sm">
                    Add to Cart
                </button>
            </form>
        @else
            <button disabled class="w-full bg-gray-400 text-white font-semibold py-2 rounded-lg cursor-not-allowed mb-2 text-sm">
                Out of Stock
            </button>
        @endif
    </div>
</div>
