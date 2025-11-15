<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">My Orders</h2>
                <p class="text-sm text-yellow-600 font-semibold">Order History</p>
            </div>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if($orders->isEmpty())
                <div class="text-center py-16 card-luxury rounded-2xl">
                    <div class="text-6xl mb-4">📭</div>
                    <p class="text-gray-700 text-lg font-semibold mb-6">No orders yet</p>
                    <a href="{{ route('shop.index') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                        Start Shopping
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="card-luxury rounded-2xl p-6 hover:shadow-lg transition-all">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <!-- Order Number & Date -->
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Order Number</p>
                                    <p class="text-lg font-bold text-gray-900">#{{ $order->id }}</p>
                                    <p class="text-xs text-gray-500 mt-2">{{ $order->created_at->format('M d, Y') }}</p>
                                </div>

                                <!-- Status -->
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Status</p>
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                        {{ $order->status === 'completed' ? 'bg-gradient-to-r from-green-400 to-emerald-400 text-white' : 
                                           ($order->status === 'pending' ? 'bg-gradient-to-r from-blue-400 to-blue-500 text-white' : 'bg-gradient-to-r from-gray-400 to-gray-500 text-white') }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>

                                <!-- Items Count -->
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Items</p>
                                    <p class="text-lg font-bold text-gray-900">{{ $order->products->count() }}</p>
                                </div>

                                <!-- Total & Action -->
                                <div class="flex flex-col justify-between">
                                    <div>
                                        <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Total</p>
                                        <p class="text-lg gold-accent font-bold">${{ number_format($order->total_price, 2) }}</p>
                                    </div>
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-center px-4 py-2 bg-yellow-500 text-white rounded-lg text-sm font-semibold hover:bg-yellow-600">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
