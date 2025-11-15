<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Cashback Terms</h2>
            <p class="text-sm text-yellow-600 font-semibold">Earn Rewards on Every Order</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Cashback Overview -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-4">GabbiToT Cashback Program</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Earn cashback rewards on every purchase at GabbiToT. Our loyalty program allows you to accumulate credits that can be used towards future orders, creating value with every meal kit you buy.
                </p>
            </div>

            <!-- How It Works -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">How Cashback Works</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500 text-white flex items-center justify-center mr-4">1</div>
                        <div>
                            <h3 class="font-bold text-gray-900">Make a Purchase</h3>
                            <p class="text-gray-600">Every meal kit order earns you 5% cashback on the purchase amount.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500 text-white flex items-center justify-center mr-4">2</div>
                        <div>
                            <h3 class="font-bold text-gray-900">Earn Rewards</h3>
                            <p class="text-gray-600">Cashback credits are automatically added to your account within 24 hours of order completion.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500 text-white flex items-center justify-center mr-4">3</div>
                        <div>
                            <h3 class="font-bold text-gray-900">Redeem Later</h3>
                            <p class="text-gray-600">Use your cashback credits towards any future purchase. No expiration date!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cashback Rates -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Cashback Rates</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-lg p-6">
                        <h3 class="font-bold text-gray-900 mb-2">Regular Orders</h3>
                        <p class="text-3xl font-bold text-yellow-600 mb-2">5%</p>
                        <p class="text-sm text-gray-600">Standard meal kit purchases</p>
                    </div>
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-lg p-6">
                        <h3 class="font-bold text-gray-900 mb-2">Subscription Orders</h3>
                        <p class="text-3xl font-bold text-yellow-600 mb-2">7%</p>
                        <p class="text-sm text-gray-600">Recurring subscription purchases</p>
                    </div>
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-lg p-6">
                        <h3 class="font-bold text-gray-900 mb-2">Referral Bonus</h3>
                        <p class="text-3xl font-bold text-yellow-600 mb-2">$10</p>
                        <p class="text-sm text-gray-600">When a referred friend makes their first purchase</p>
                    </div>
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-lg p-6">
                        <h3 class="font-bold text-gray-900 mb-2">Birthday Bonus</h3>
                        <p class="text-3xl font-bold text-yellow-600 mb-2">$5</p>
                        <p class="text-sm text-gray-600">Birthday month reward (when you join the program)</p>
                    </div>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="card-luxury rounded-2xl p-8 mb-8 prose prose-sm max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Program Terms</h2>
                <div class="text-gray-700 space-y-4">
                    <div>
                        <h3 class="font-bold text-gray-900">Eligibility</h3>
                        <p>You must be logged into your GabbiToT account to earn and redeem cashback. Cashback is not available for guest checkout purchases.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Accrual</h3>
                        <p>Cashback is calculated on the subtotal amount before taxes and shipping fees. Refunded orders will have their associated cashback credits reversed.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Redemption</h3>
                        <p>Cashback credits can be applied at checkout as a discount. The minimum redeemable amount is $1.00. Credits do not expire and can be accumulated indefinitely.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Fraud Prevention</h3>
                        <p>GabbiToT reserves the right to cancel the membership or adjust cashback credits if fraudulent activity is detected or if terms are violated.</p>
                    </div>
                </div>
            </div>

            <!-- Questions -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Have Questions About Cashback?</h2>
                <a href="{{ route('help-center') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                    Contact Support →
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
