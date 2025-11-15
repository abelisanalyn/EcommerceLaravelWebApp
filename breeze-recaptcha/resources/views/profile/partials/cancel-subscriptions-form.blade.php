<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Cancel Subscriptions') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('If you are a member with active subscriptions, please cancel them before deleting your account.') }}
        </p>
    </header>

    @if($subscriptions && $subscriptions->count() > 0)
        <div class="space-y-4">
            @foreach($subscriptions as $subscription)
                <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-900 dark:text-gray-100">
                                {{ $subscription->name ?? 'Subscription' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Status: <span class="font-semibold">{{ ucfirst($subscription->stripe_status) }}</span>
                            </p>
                        </div>
                        @if($subscription->stripe_status === 'active')
                            <form method="post" action="{{ route('subscriptions.cancel', $subscription->id) }}" class="inline">
                                @csrf
                                @method('post')
                                <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition text-sm">
                                    {{ __('Cancel Subscription') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('You have no active subscriptions.') }}
        </p>
    @endif
</section>
