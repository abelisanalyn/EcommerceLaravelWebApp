<footer class="text-black border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-7 gap-8 mb-8 text-center">
            <!-- Column 1 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Company</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('about-us') }}" class="hover:text-yellow-600 transition">About Us</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-yellow-600 transition">Careers</a></li>
                    <li><a href="{{ route('partner-with-us') }}" class="hover:text-yellow-600 transition">Partner with Us</a></li>
                </ul>
            </div>

            <!-- Column 2 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Support</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('help-center') }}" class="hover:text-yellow-600 transition">Help Center</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-yellow-600 transition">Contact</a></li>
                    <li><a href="{{ route('security') }}" class="hover:text-yellow-600 transition">Security</a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Legal</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('terms-conditions') }}" class="hover:text-yellow-600 transition">Terms and Conditions</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-yellow-600 transition">Privacy Policy</a></li>
                    <li><a href="{{ route('cashback-terms') }}" class="hover:text-yellow-600 transition">Cashback Terms</a></li>
                </ul>
            </div>

            <!-- Column 4 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Resources</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('subscription.guide') }}" class="hover:text-yellow-600 transition">Subscription Guide</a></li>
                    <li><a href="{{ route('meal-kits.index') }}" class="hover:text-yellow-600 transition">Meal Kits</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-600 transition">Dashboard</a></li>
                </ul>
            </div>

            <!-- Column 5 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Account</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('profile.edit') }}" class="hover:text-yellow-600 transition">Profile</a></li>
                    <li><a href="{{ route('orders.my') }}" class="hover:text-yellow-600 transition">My Orders</a></li>
                    <li><a href="{{ route('subscriptions.index') }}" class="hover:text-yellow-600 transition">Subscriptions</a></li>
                </ul>
            </div>

            <!-- Column 6 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Shopping</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('meal-kits.index') }}" class="hover:text-yellow-600 transition">Browse Meals</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-yellow-600 transition">Shopping Cart</a></li>
                    <li><a href="{{ route('checkout.checkout') }}" class="hover:text-yellow-600 transition">Checkout</a></li>
                </ul>
            </div>

            <!-- Column 7 -->
            <div>
                <h3 class="font-semibold text-black mb-4">Info</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-600 transition">Pricing</a></li>
                    <li><a href="{{ route('help-center') }}" class="hover:text-yellow-600 transition">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-yellow-600 transition">Get Support</a></li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 pt-8 text-center">
            <p class="text-gray-600 text-sm mb-4">
                &copy; 2025 GX'BAG Grayxie's Bag. All rights reserved.
            </p>
            <div class="flex space-x-4 justify-center mb-4">
                <a href="{{ route('privacy-policy') }}" class="text-gray-600 hover:text-yellow-600 text-sm transition">Privacy</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('terms-conditions') }}" class="text-gray-600 hover:text-yellow-600 text-sm transition">Terms</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('security') }}" class="text-gray-600 hover:text-yellow-600 text-sm transition">Security</a>
            </div>
            <div class="flex space-x-6 justify-center">
                <a href="{{ env('FACEBOOK_URL') }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-semibold transition">Facebook</a>
                <span class="text-gray-400">|</span>
                <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="text-pink-600 hover:text-pink-800 font-semibold transition">Instagram</a>
                <span class="text-gray-400">|</span>
                <a href="{{ env('TIKTOK_URL') }}" target="_blank" class="text-gray-900 hover:text-gray-700 font-semibold transition">TikTok</a>
            </div>
        </div>
    </div>
</footer>
