<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Partner With Us</h2>
            <p class="text-sm text-yellow-600 font-semibold">Growing Together for Culinary Excellence</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-4">Strategic Partnerships</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    GabbiToT is always looking for innovative partners who share our passion for quality and sustainability. Whether you're a supplier, restaurant, technology company, or media partner, we'd love to explore opportunities to collaborate.
                </p>
            </div>

            <!-- Partnership Types -->
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Partnership Opportunities</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="card-luxury rounded-2xl p-6">
                    <div class="text-4xl mb-4">🌾</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Supplier Partners</h3>
                    <p class="text-gray-700">We partner with local farms, producers, and artisans to source premium ingredients. Consistent quality and sustainability are essential.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <div class="text-4xl mb-4">🤖</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Technology Partners</h3>
                    <p class="text-gray-700">Help us innovate with logistics, logistics optimization, AI-powered recommendations, or sustainability tools.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <div class="text-4xl mb-4">📺</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Media & Influencer Partners</h3>
                    <p class="text-gray-700">Collaborate with us to showcase premium culinary experiences. Co-marketing and content creation opportunities available.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <div class="text-4xl mb-4">🏢</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Corporate Partnerships</h3>
                    <p class="text-gray-700">Offer GabbiToT meal kits as employee benefits or corporate gifts. Custom packages and bulk pricing available.</p>
                </div>
            </div>

            <!-- Benefits -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-6">Partner Benefits</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Access to our growing customer base and market opportunities</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Co-branding and marketing opportunities to increase visibility</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Fair pricing and transparent partnership agreements</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Dedicated partnership manager to ensure success</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Regular performance reviews and growth opportunities</span>
                    </li>
                </ul>
            </div>

            <!-- CTA -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Ready to Partner?</h2>
                <a href="{{ route('contact') }}" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 shadow-lg hover:shadow-xl transition-all">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
