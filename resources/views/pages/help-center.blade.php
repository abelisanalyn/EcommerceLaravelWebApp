<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Help Center</h2>
            <p class="text-sm text-yellow-600 font-semibold">Find Answers to Your Questions</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- FAQ Section -->
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>
            
            <div class="space-y-4 mb-8">
                <!-- FAQ 1 -->
                <details class="card-luxury rounded-2xl p-6 group cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-lg text-gray-900">
                        How do I place my first order?
                        <span class="text-xl group-open:rotate-180 transition">▼</span>
                    </summary>
                    <p class="text-gray-700 mt-4">
                        Simply browse our Meal Kits catalog, add items to your cart, and proceed to checkout. You'll need to create an account and provide delivery information. Your order will arrive within 2-3 business days.
                    </p>
                </details>

                <!-- FAQ 2 -->
                <details class="card-luxury rounded-2xl p-6 group cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-lg text-gray-900">
                        Can I cancel my subscription?
                        <span class="text-xl group-open:rotate-180 transition">▼</span>
                    </summary>
                    <p class="text-gray-700 mt-4">
                        Yes! You can skip weeks or cancel anytime from your account dashboard. No questions asked. If you have any issues, our support team is happy to help.
                    </p>
                </details>

                <!-- FAQ 3 -->
                <details class="card-luxury rounded-2xl p-6 group cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-lg text-gray-900">
                        Are your ingredients organic?
                        <span class="text-xl group-open:rotate-180 transition">▼</span>
                    </summary>
                    <p class="text-gray-700 mt-4">
                        We prioritize locally-sourced, high-quality ingredients. While not all are certified organic, we work with suppliers who follow sustainable farming practices. Check individual meal descriptions for ingredient details.
                    </p>
                </details>

                <!-- FAQ 4 -->
                <details class="card-luxury rounded-2xl p-6 group cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-lg text-gray-900">
                        What if I'm not satisfied with my order?
                        <span class="text-xl group-open:rotate-180 transition">▼</span>
                    </summary>
                    <p class="text-gray-700 mt-4">
                        Your satisfaction is our priority. If you're not happy, contact our support team within 24 hours of delivery for a full refund or replacement.
                    </p>
                </details>

                <!-- FAQ 5 -->
                <details class="card-luxury rounded-2xl p-6 group cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-lg text-gray-900">
                        How are meals delivered?
                        <span class="text-xl group-open:rotate-180 transition">▼</span>
                    </summary>
                    <p class="text-gray-700 mt-4">
                        Meals are packed in insulated containers with ice packs to maintain freshness. We offer flexible delivery times and you can track your order in real-time through our app.
                    </p>
                </details>
            </div>

            <!-- Support Options -->
            <div class="card-luxury rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Still Need Help?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">📧 Email Support</h3>
                        <p class="text-gray-600 mb-4">support@gabbitot.com</p>
                        <p class="text-sm text-gray-600">Response time: 24 hours</p>
                    </div>

                </div>
            </div>

            <!-- CTA -->
            <div class="mt-8 text-center">
                <a href="{{ route('contact') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                    Contact Support →
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
