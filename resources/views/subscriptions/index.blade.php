<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
                <h2 class="section-title mb-1">Your Subscription Plans</h2>
                <p class="text-sm text-yellow-600 font-semibold">🎯 Personalized Meal Journeys</p>
            </div>
            <a href="{{ route('subscriptions.create') }}" class="animated-btn">
                <x-primary-button class="shadow-lg">
                    {{ __('+ New Subscription') }}
                </x-primary-button>
            </a>
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

            @forelse ($subscriptions as $subscription)
                <div class="card-luxury rounded-2xl p-6 mb-6 subscription-card overflow-hidden group">
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-5 bg-gradient-to-r from-yellow-500 to-orange-500 transition-opacity"></div>
                    <div class="relative">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <!-- Plan Info -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-yellow-600 transition-colors">{{ $subscription->plan->name }}</h3>
                                <p class="text-sm text-gray-600 mb-3">{{ $subscription->plan->description }}</p>
                                <div class="premium-price">${{ number_format($subscription->total_price, 2) }}</div>
                                <div class="mt-2 text-xs text-gray-500">{{ $subscription->plan->duration_weeks }} weeks duration</div>
                            </div>

                            <!-- Status & Meals -->
                            <div class="flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Status</p>
                                    <span class="inline-block px-4 py-2 rounded-full text-sm font-bold
                                        {{ $subscription->status === 'active' ? 'bg-gradient-to-r from-green-400 to-emerald-400 text-white' : 
                                           ($subscription->status === 'paused' ? 'bg-gradient-to-r from-amber-400 to-yellow-400 text-white' : 'bg-gradient-to-r from-red-400 to-rose-400 text-white') }}">
                                        {{ ucfirst($subscription->status) }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500">
                                    <span class="block text-2xl mt-2 gold-accent font-bold">{{ $subscription->meals_per_week }}</span>
                                    <span>meals/week</span>
                                </div>
                            </div>

                            <!-- Delivery Info -->
                            <div class="flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-2">Started</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $subscription->start_date->format('M d, Y') }}</p>
                                </div>
                                <div class="mt-4">
                                    <p class="text-xs text-gray-600 font-semibold uppercase mb-1">Next Delivery</p>
                                    <div class="inline-block px-3 py-1 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200">
                                        <p class="text-sm font-bold text-blue-700">{{ $subscription->next_delivery_date->format('M d') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col justify-between">
                                <div class="text-right">
                                    <div class="inline-block text-3xl">📦</div>
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="flex-1 px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg text-sm text-center font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure? This meal train is about to derail!');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all hover:-translate-y-0.5">
                                            🗑️ Cancel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 card-luxury rounded-2xl">
                    <div class="text-6xl mb-4 animate-bounce">📭</div>
                    <p class="text-gray-700 text-lg font-semibold mb-2">No Active Meal Subscriptions Yet</p>
                    <p class="text-gray-600 text-sm mb-6">Time to start your culinary adventure!</p>
                    <a href="{{ route('subscriptions.create') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all hover:-translate-y-1">
                        🎉 Claim Your First Subscription
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
