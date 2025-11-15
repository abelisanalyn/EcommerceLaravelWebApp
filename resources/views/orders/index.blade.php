<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">Your Orders</h2>
                <p class="text-sm text-yellow-600 font-semibold">📦 Track and Manage Your Purchases</p>
            </div>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-8 p-4 bg-gradient-to-r from-green-400 to-emerald-400 text-white rounded-lg shadow-lg border border-green-300 backdrop-blur flex items-center gap-3">
                    <span class="text-2xl">✓</span>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            @forelse ($orders as $order)
                <div class="card-luxury rounded-2xl p-6 mb-6 order-card overflow-hidden group">
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-5 bg-gradient-to-r from-yellow-500 to-orange-500 transition-opacity"></div>
                    <div class="relative">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                            <!-- Order Info -->
                            <div>
                                <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Order ID</p>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors">#{{ $order->id }}</h3>
                                <p class="text-sm text-gray-600 mb-3">{{ $order->items_count }} {{ $order->items_count == 1 ? 'item' : 'items' }}</p>
                                <div class="premium-price">${{ number_format($order->total_amount, 2) }}</div>
                            </div>

                            <!-- Status & Date -->
                            <div class="flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Status</p>
                                    <span class="inline-block px-4 py-2 rounded-full text-sm font-bold
                                        {{ $order->status === 'completed' ? 'bg-gradient-to-r from-green-400 to-emerald-400 text-white' : 
                                           ($order->status === 'pending' ? 'bg-gradient-to-r from-amber-400 to-yellow-400 text-white' : 
                                           ($order->status === 'shipped' ? 'bg-gradient-to-r from-blue-400 to-indigo-400 text-white' : 'bg-gradient-to-r from-red-400 to-rose-400 text-white')) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500 mt-4">
                                    <span class="block text-2xl mt-2 gold-accent font-bold">{{ $order->created_at->format('M d') }}</span>
                                    <span>{{ $order->created_at->format('Y') }}</span>
                                </div>
                            </div>

                            <!-- Delivery Info -->
                            <div class="flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Ordered</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="mt-4">
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Expected Delivery</p>
                                    <div class="inline-block px-3 py-1 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200">
                                        <p class="text-sm font-bold text-blue-700">{{ $order->expected_delivery_date ? $order->expected_delivery_date->format('M d') : 'TBA' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Info -->
                            <div class="flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Shipping To</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $order->shipping_address ?? 'Not specified' }}</p>
                                </div>
                                <div class="mt-4">
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Payment</p>
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                        {{ ucfirst($order->payment_method ?? 'Unknown') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col justify-between">
                                <div class="text-right">
                                    <div class="inline-block text-3xl">📦</div>
                                </div>
                                <div class="flex gap-2 flex-col">
                                    <a href="{{ route('orders.show', $order->id) }}" class="w-full px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg text-sm text-center font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                                        👁️ View Details
                                    </a>
                                    @if($order->status === 'pending')
                                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Cancel this order?');">
                                            @csrf
                                            <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                                                ✕ Cancel
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 card-luxury rounded-2xl">
                    <div class="text-6xl mb-4 animate-bounce">📭</div>
                    <p class="text-gray-700 text-lg font-semibold mb-2">No Orders Yet</p>
                    <p class="text-gray-600 text-sm mb-6">Start shopping to place your first order!</p>
                    <a href="{{ route('meal-kits.index') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all hover:-translate-y-1">
                        🛍️ Start Shopping
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
