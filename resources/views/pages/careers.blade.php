<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Careers</h2>
            <p class="text-sm text-yellow-600 font-semibold">Join Our Growing Team</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-4">Build Your Career with GabbiToT</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    We're looking for passionate individuals who share our vision of revolutionizing the meal kit industry. Whether you're a chef, engineer, designer, or business professional, there's a place for you on our team.
                </p>
            </div>

            <!-- Open Positions -->
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Open Positions</h2>
            <div class="space-y-4 mb-8">
                <div class="card-luxury rounded-2xl p-6 border-l-4 border-blue-500">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Head Chef - Menu Development</h3>
                    <p class="text-sm text-gray-600 mb-3">Full-time • Culinary</p>
                    <p class="text-gray-700">We seek an experienced chef to lead our culinary team and create innovative recipes. Requirements: 5+ years experience, passion for local sourcing.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6 border-l-4 border-green-500">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Full Stack Developer</h3>
                    <p class="text-sm text-gray-600 mb-3">Full-time • Technology</p>
                    <p class="text-gray-700">Help us build the next generation of our platform. Must have experience with Laravel, React, and modern web technologies.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6 border-l-4 border-purple-500">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Customer Success Manager</h3>
                    <p class="text-sm text-gray-600 mb-3">Full-time • Customer Success</p>
                    <p class="text-gray-700">Build lasting relationships with our customers and ensure their satisfaction. Excellent communication skills required.</p>
                </div>
            </div>

            <!-- Benefits -->
            <div class="card-luxury rounded-2xl p-8">
                <h2 class="section-title mb-6">Why Join GabbiToT?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="text-2xl mr-4">✓</div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Competitive Salary</h3>
                            <p class="text-gray-600">Industry-leading compensation packages</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="text-2xl mr-4">✓</div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Health Benefits</h3>
                            <p class="text-gray-600">Comprehensive health and wellness coverage</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="text-2xl mr-4">✓</div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Remote Work</h3>
                            <p class="text-gray-600">Flexible work arrangements available</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="text-2xl mr-4">✓</div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Professional Growth</h3>
                            <p class="text-gray-600">Continuous learning and development opportunities</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-8 text-center">
                <a href="{{ route('contact') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                    Apply Now →
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
