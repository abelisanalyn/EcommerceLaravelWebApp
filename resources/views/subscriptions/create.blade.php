<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Start Your Subscription') }}
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

                    <form action="{{ route('subscriptions.checkout') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="subscription_plan_id" :value="__('Choose Your Plan')" />
                            <div class="mt-3 grid grid-cols-1 gap-4">
                                @foreach($plans as $plan)
                                    <label class="border-2 border-gray-300 rounded-lg p-4 cursor-pointer hover:border-orange-500 transition-colors {{ old('subscription_plan_id') == $plan->id ? 'border-orange-500 bg-orange-50' : '' }}">
                                        <div class="flex items-start">
                                            <input type="radio" name="subscription_plan_id" value="{{ $plan->id }}" class="mt-1" {{ old('subscription_plan_id') == $plan->id ? 'checked' : '' }} required>
                                            <div class="ml-4 flex-1">
                                                <h3 class="font-bold text-lg">{{ $plan->name }}</h3>
                                                <p class="text-gray-600 text-sm">{{ $plan->description }}</p>
                                                <div class="mt-2 flex justify-between items-center">
                                                    <span class="text-sm text-gray-500">{{ $plan->meals_per_week }} meals/week • {{ $plan->duration_weeks }} weeks</span>
                                                    <span class="text-orange-600 font-bold text-lg">${{ number_format($plan->price, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <x-input-label for="start_date" :value="__('Start Date')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                            <p class="text-sm text-gray-500 mt-1">Choose when your subscription should begin</p>
                        </div>

                        <div>
                            <x-input-label for="meals_per_week" :value="__('Meals Per Week')" />
                            <select id="meals_per_week" name="meals_per_week" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select number of meals</option>
                                @for($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}" {{ old('meals_per_week') == $i ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? 'meal' : 'meals' }} per week</option>
                                @endfor
                            </select>
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <p class="text-sm text-blue-800">
                                <strong>Note:</strong> Your subscription will start on the selected date and include fresh, Tasteful or Tender meal kits delivered to your door each week.
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('subscriptions.index') }}" class="text-gray-600 hover:text-gray-900">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                {{ __('Start Subscription') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
