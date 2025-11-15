<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">Order Details</h2>
                <p class="text-sm text-yellow-600 font-semibold">Order #{{ $order->id }}</p>
            </div>
            <a href="{{ route('orders.my') }}" class="animated-btn">
                <x-primary-button class="shadow-lg">
                    ← Back to Orders
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Order Status -->
            <div class="card-luxury rounded-2xl p-8 mb-8 overflow-hidden">
                <div class="absolute inset-0 opacity-0 hover:opacity-5 bg-gradient-to-r from-yellow-500 to-orange-500 transition-opacity"></div>
                <div class="relative">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <p class="text-sm text-gray-600 font-semibold uppercase mb-2">Order ID</p>
                            <p class="text-2xl font-bold gold-accent">#{{ $order->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold uppercase mb-2">Status</p>
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-bold
                                {{ $order->status === 'completed' ? 'bg-gradient-to-r from-green-400 to-emerald-400 text-white' : 
                                   ($order->status === 'pending' ? 'bg-gradient-to-r from-amber-400 to-yellow-400 text-white' : 
                                   ($order->status === 'shipped' ? 'bg-gradient-to-r from-blue-400 to-indigo-400 text-white' : 'bg-gradient-to-r from-red-400 to-rose-400 text-white')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold uppercase mb-2">Ordered Date</p>
                            <p class="text-lg font-semibold text-gray-800">{{ $order->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold uppercase mb-2">Total Amount</p>
                            <p class="text-2xl font-bold gold-accent">${{ number_format($order->total_amount, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Items -->
                <div class="lg:col-span-2">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Order Items</h3>
                    <div class="card-luxury rounded-2xl p-6 mb-8">
                        @if($order->items && count($order->items) > 0)
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex items-center justify-between p-4 border-b border-gray-200 last:border-b-0 hover:bg-gray-50 rounded-lg transition">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-gray-900 mb-1">{{ $item['name'] ?? 'Product' }}</h4>
                                            <p class="text-sm text-gray-600">Qty: {{ $item['quantity'] ?? 1 }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">${{ number_format($item['price'] ?? 0, 2) }}</p>
                                            <p class="text-sm text-gray-600">{{ number_format($item['quantity'] ?? 1) }} x</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600 text-center py-8">No items in this order</p>
                        @endif
                    </div>

                    <!-- Order Timeline -->
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Order Timeline</h3>
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="h-3 w-3 rounded-full bg-gradient-to-r from-green-400 to-emerald-400 border-2 border-white"></div>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Order Placed</p>
                                    <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>
                            
                            @if($order->status !== 'pending')
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="h-3 w-3 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 border-2 border-white"></div>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Order Confirmed</p>
                                        <p class="text-sm text-gray-600">{{ $order->confirmed_at ? $order->confirmed_at->format('M d, Y \a\t h:i A') : 'Processing...' }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($order->status === 'shipped' || $order->status === 'completed')
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="h-3 w-3 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 border-2 border-white"></div>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Shipped</p>
                                        <p class="text-sm text-gray-600">{{ $order->shipped_at ? $order->shipped_at->format('M d, Y \a\t h:i A') : 'On the way...' }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($order->status === 'completed')
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="h-3 w-3 rounded-full bg-gradient-to-r from-green-400 to-emerald-400 border-2 border-white"></div>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">Delivered</p>
                                        <p class="text-sm text-gray-600">{{ $order->delivered_at ? $order->delivered_at->format('M d, Y \a\t h:i A') : 'Completed' }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div>
                    <!-- Shipping Address -->
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Shipping Address</h3>
                    <div class="card-luxury rounded-2xl p-6 mb-6">
                        <div class="space-y-3">
                            <p class="text-gray-900 font-semibold">{{ $order->shipping_name ?? 'Not provided' }}</p>
                            <p class="text-sm text-gray-600">{{ $order->shipping_address ?? 'No address' }}</p>
                            <p class="text-sm text-gray-600">{{ $order->shipping_city ?? '' }} {{ $order->shipping_state ?? '' }} {{ $order->shipping_zip ?? '' }}</p>
                            <p class="text-sm text-gray-600">{{ $order->shipping_country ?? '' }}</p>
                            <p class="text-sm font-semibold text-gray-900 mt-3">📞 {{ $order->shipping_phone ?? 'No phone' }}</p>
                        </div>
                    </div>

                    <!-- Billing Info -->
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Billing Info</h3>
                    <div class="card-luxury rounded-2xl p-6 mb-6">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-semibold text-gray-900">${{ number_format($order->subtotal ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping:</span>
                                <span class="font-semibold text-gray-900">${{ number_format($order->shipping_cost ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax:</span>
                                <span class="font-semibold text-gray-900">${{ number_format($order->tax ?? 0, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3 flex justify-between">
                                <span class="font-bold text-gray-900">Total:</span>
                                <span class="font-bold gold-accent text-lg">${{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Payment Method</h3>
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="space-y-3">
                            <p class="text-gray-900 font-semibold flex items-center gap-2">
                                💳 {{ ucfirst($order->payment_method ?? 'Credit Card') }}
                            </p>
                            <p class="text-sm text-gray-600">{{ $order->payment_status ?? 'Pending' }}</p>
                            <p class="text-xs text-gray-500 mt-4">Transaction ID: {{ $order->transaction_id ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
