<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Total Orders</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalOrders }}</p>
                        </div>
                        <div class="text-4xl text-blue-500">📦</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Products</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalProducts }}</p>
                        </div>
                        <div class="text-4xl text-green-500">🍽️</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Customers</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalCustomers }}</p>
                        </div>
                        <div class="text-4xl text-purple-500">👥</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Revenue</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">${{ number_format($totalRevenue, 2) }}</p>
                        </div>
                        <div class="text-4xl text-yellow-500">💰</div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('admin.products.create') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Add Product</h3>
                    <p class="text-gray-600 text-sm">Create a new meal product</p>
                </a>

                <a href="{{ route('admin.products.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Manage Products</h3>
                    <p class="text-gray-600 text-sm">View and edit all products</p>
                </a>

                <a href="{{ route('admin.orders.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition-shadow cursor-pointer">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">View Orders</h3>
                    <p class="text-gray-600 text-sm">Manage customer orders</p>
                </a>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
                    
                    @if ($recentOrders->count())
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-100 border-b">
                                    <tr>
                                        <th class="text-left px-4 py-2">Order ID</th>
                                        <th class="text-left px-4 py-2">Customer</th>
                                        <th class="text-left px-4 py-2">Total</th>
                                        <th class="text-left px-4 py-2">Status</th>
                                        <th class="text-left px-4 py-2">Date</th>
                                        <th class="text-left px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOrders as $order)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-4 py-3 font-semibold">#{{ $order->id }}</td>
                                            <td class="px-4 py-3">{{ $order->user->name }}</td>
                                            <td class="px-4 py-3 font-semibold">${{ number_format($order->total_price, 2) }}</td>
                                            <td class="px-4 py-3">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                                    {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                    {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                                                    {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                                                ">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-900 font-semibold">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600 text-center py-8">No orders yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
