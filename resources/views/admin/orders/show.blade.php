<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details #' . $order->id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Order Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                            <p class="text-sm text-gray-600 mb-1">Name</p>
                            <p class="font-semibold mb-4">{{ $order->user->name }}</p>
                            
                            <p class="text-sm text-gray-600 mb-1">Email</p>
                            <p class="font-semibold mb-4">{{ $order->user->email }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-4">Order Information</h3>
                            <p class="text-sm text-gray-600 mb-1">Order Number</p>
                            <p class="font-semibold mb-4">#{{ $order->id }}</p>
                            
                            <p class="text-sm text-gray-600 mb-1">Order Date</p>
                            <p class="font-semibold">{{ $order->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Shipping Address</h3>
                    <p class="font-semibold">{{ $order->shipping_name }}</p>
                    <p class="text-gray-700">{{ $order->shipping_address }}</p>
                    <p class="text-gray-700">{{ $order->shipping_city }}</p>
                    <p class="text-gray-700 mt-2">Phone: {{ $order->shipping_phone }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="text-left px-4 py-3 font-semibold">Product</th>
                                    <th class="text-left px-4 py-3 font-semibold">Quantity</th>
                                    <th class="text-left px-4 py-3 font-semibold">Price</th>
                                    <th class="text-left px-4 py-3 font-semibold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->products as $product)
                                    <tr class="border-b">
                                        <td class="px-4 py-3">
                                            <strong>{{ $product->name }}</strong>
                                            @if ($product->category)
                                                <p class="text-xs text-gray-600">{{ $product->category->name }}</p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">{{ $product->pivot->quantity }}</td>
                                        <td class="px-4 py-3">${{ number_format($product->pivot->price, 2) }}</td>
                                        <td class="px-4 py-3 font-semibold">${{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-gray-600">
                                            No items in this order.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-right mt-6 border-t pt-4">
                        <p class="text-lg font-bold">Total: ${{ number_format($order->total_price, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Status -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Order Status</h3>
                    
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Current Status</p>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $order->status === 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                        ">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex gap-4 items-center">
                        @csrf
                        @method('PATCH')
                        
                        <select name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="">Select new status</option>
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
                    ← Back to Orders
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
