<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Checkout') }}
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

                    <!-- Order Summary -->
                    <div class="mb-8 bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h3>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between text-gray-700">
                                <span>Plan:</span>
                                <span class="font-semibold">{{ $plan->name }}</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>Meals per week:</span>
                                <span>{{ $planData['meals_per_week'] }}</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>Start date:</span>
                                <span>{{ \Carbon\Carbon::parse($planData['start_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>Duration:</span>
                                <span>{{ $plan->duration_weeks }} weeks</span>
                            </div>
                            <hr class="my-3">
                            <div class="flex justify-between text-lg font-bold text-gray-900">
                                <span>Total:</span>
                                <span class="text-orange-600">${{ number_format($planData['plan_price'], 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Form -->
                    <form action="{{ route('subscriptions.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Shipping Information</h3>

                        <div>
                            <x-input-label for="shipping_name" :value="__('Full Name')" />
                            <x-text-input 
                                id="shipping_name" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="shipping_name" 
                                :value="old('shipping_name')" 
                                required 
                            />
                            <x-input-error :messages="$errors->get('shipping_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="shipping_address" :value="__('Street Address')" />
                            <x-text-input 
                                id="shipping_address" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="shipping_address" 
                                :value="old('shipping_address')" 
                                required 
                            />
                            <x-input-error :messages="$errors->get('shipping_address')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="shipping_city" :value="__('City')" />
                            <x-text-input 
                                id="shipping_city" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="shipping_city" 
                                :value="old('shipping_city')" 
                                required 
                            />
                            <x-input-error :messages="$errors->get('shipping_city')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="shipping_phone" :value="__('Phone Number')" />
                            <x-text-input 
                                id="shipping_phone" 
                                class="block mt-1 w-full" 
                                type="tel" 
                                name="shipping_phone" 
                                :value="old('shipping_phone')" 
                                required 
                            />
                            <x-input-error :messages="$errors->get('shipping_phone')" class="mt-2" />
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                            <p class="text-sm text-blue-800">
                                <strong>Secure Checkout:</strong> Your information is encrypted and secure. Your subscription will start on the selected date with fresh meal kits delivered to your address each week.
                            </p>
                        </div>

                        <div class="flex items-center justify-between gap-4 mt-8">
                            <a href="{{ route('subscriptions.create') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
                                {{ __('← Back to Plan Selection') }}
                            </a>
                            <x-primary-button>
                                {{ __('Complete Purchase - $' . number_format($planData['plan_price'], 2)) }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
