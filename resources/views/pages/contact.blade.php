<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Contact Us</h2>
            <p class="text-sm text-yellow-600 font-semibold">We'd Love to Hear From You</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="card-luxury rounded-2xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h2>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500" placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500" placeholder="your@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500" placeholder="How can we help?">
                        </div>
                        <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Your message..."></textarea>
                        </div>
                        <div class="pt-4">
                        <button type="submit" class="w-full px-6 py-4 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition-all shadow-lg">
                                Send
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6">
                    <!-- Email -->
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="flex items-start">
                            <div class="text-3xl mr-4">📧</div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                                <p class="text-gray-600">support@gabbitot.com</p>
                                <p class="text-gray-600">business@gabbitot.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="flex items-start">
                            <div class="text-3xl mr-4">📞</div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Phone</h3>
                                <p class="text-gray-600">+639620463293</p>
                                <p class="text-sm text-gray-500 mt-2">Mon-Sat, 7:30 AM - 8:30 PM UTC+8</p>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="flex items-start">
                            <div class="text-3xl mr-4">📍</div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Address</h3>
                                <p class="text-gray-600">21 Mithi St.</p>
                                <p class="text-gray-600">Caloocan City</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="card-luxury rounded-2xl p-6">
                        <div class="flex items-start">
                            <div class="text-3xl mr-4">🕐</div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-2">Business Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 7:30 AM - 8:30 PM</p>
                                <p class="text-gray-600">Saturday - Sunday: 7:30 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
