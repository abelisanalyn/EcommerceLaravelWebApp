<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-bold mb-6">Subscription Confirmation ✓</h3>
                    <p class="text-gray-600 mb-6">Thank you for your subscription to <strong>{{ $subscription->plan->name }}</strong>!</p>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Status</p>
                            <p class="text-xl font-bold text-{{ $subscription->status === 'active' ? 'green' : ($subscription->status === 'paused' ? 'yellow' : 'red') }}-600 mt-1">{{ ucfirst($subscription->status) }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Price</p>
                            <p class="text-xl font-bold text-orange-600 mt-1">${{ number_format($subscription->total_price, 2) }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Meals Per Week</p>
                            <p class="text-xl font-bold mt-1">{{ $subscription->meals_per_week }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Next Delivery</p>
                            <p class="text-xl font-bold mt-1">{{ $subscription->next_delivery_date->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <div class="border-t pt-6 mb-6">
                        <p class="text-sm text-gray-600 mb-2">Plan Details</p>
                        <p class="text-gray-700">{{ $subscription->plan->description }}</p>
                    </div>

                    @if ($subscription->shipping_address)
                        <div class="border-t pt-6 mb-6">
                            <p class="text-sm text-gray-600 mb-2">Shipping Address</p>
                            <p class="text-gray-700 font-semibold">{{ $subscription->shipping_name }}</p>
                            <p class="text-gray-700">{{ $subscription->shipping_address }}</p>
                            <p class="text-gray-700">{{ $subscription->shipping_city }}</p>
                            <p class="text-gray-700">Phone: {{ $subscription->shipping_phone }}</p>
                        </div>
                    @endif

                    <div class="border-t pt-6 flex gap-4">
                        <a href="{{ route('subscriptions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">View All Subscriptions</a>
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Go to Dashboard</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
