<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <h3 class="font-bold text-lg mb-2">{{ $subscription->plan->name }}</h3>
                            <p class="text-gray-600">{{ $subscription->plan->description }}</p>
                            <p class="text-orange-600 font-bold text-2xl mt-2">${{ number_format($subscription->total_price, 2) }}</p>
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Subscription Status')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="active" {{ old('status', $subscription->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ old('status', $subscription->status) === 'paused' ? 'selected' : '' }}>Paused</option>
                                <option value="cancelled" {{ old('status', $subscription->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <p class="text-sm text-gray-500 mt-2">
                                <strong>Active:</strong> Receive meals regularly | 
                                <strong>Paused:</strong> Temporarily stop meals | 
                                <strong>Cancelled:</strong> End subscription
                            </p>
                        </div>

                        <div>
                            <x-input-label for="meals_per_week" :value="__('Meals Per Week')" />
                            <select id="meals_per_week" name="meals_per_week" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                @for($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}" {{ old('meals_per_week', $subscription->meals_per_week) == $i ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? 'meal' : 'meals' }} per week</option>
                                @endfor
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                            <div>
                                <p class="text-sm text-gray-600">Start Date</p>
                                <p class="font-semibold">{{ $subscription->start_date->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Next Delivery</p>
                                <p class="font-semibold">{{ $subscription->next_delivery_date->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('subscriptions.index') }}" class="text-gray-600 hover:text-gray-900">
                                {{ __('Back') }}
                            </a>
                            <x-primary-button>
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
