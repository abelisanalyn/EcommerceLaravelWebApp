<x-app-layout>
    <x-slot name="header">
        <div>
            <h1 class="font-script gold-accent text-5xl mb-2">GabbiToT</h1>
            <h2 class="section-title mb-1">Security</h2>
            <p class="text-sm text-yellow-600 font-semibold">Your Trust is Our Priority</p>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Security Overview -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-4">Security at GabbiToT</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    We take your security and privacy seriously. Our platform uses industry-leading encryption, regular security audits, and compliance with international standards to protect your data.
                </p>
            </div>

            <!-- Security Features -->
            <h2 class="text-3xl font-bold text-gray-900 mb-6">How We Protect You</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">🔐 Encryption</h3>
                    <p class="text-gray-600">All data transmitted between your device and our servers is encrypted using SSL/TLS protocol (256-bit encryption).</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">🔑 Secure Authentication</h3>
                    <p class="text-gray-600">We implement strong password requirements and optional two-factor authentication (2FA) for enhanced account security.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">🏦 Payment Security</h3>
                    <p class="text-gray-600">Payment processing is handled by PCI-DSS compliant partners. We never store full credit card details on our servers.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">🔍 Regular Audits</h3>
                    <p class="text-gray-600">We conduct regular security audits and penetration testing by third-party security experts.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">🛡️ Data Protection</h3>
                    <p class="text-gray-600">Your personal information is stored securely and is only accessed by authorized personnel when necessary.</p>
                </div>
                <div class="card-luxury rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">📋 Compliance</h3>
                    <p class="text-gray-600">We comply with GDPR, CCPA, and other relevant data protection regulations.</p>
                </div>
            </div>

            <!-- Security Best Practices -->
            <div class="card-luxury rounded-2xl p-8 mb-8">
                <h2 class="section-title mb-6">Your Security Responsibilities</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Use a strong, unique password for your GabbiToT account</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Never share your login credentials with anyone</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Enable two-factor authentication when available</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Log out of your account on shared devices</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Keep your device and browser up to date with security patches</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-500 font-bold mr-3">•</span>
                        <span>Report any suspicious activity immediately</span>
                    </li>
                </ul>
            </div>

            <!-- Report Security Issue -->
            <div class="card-luxury rounded-2xl p-8 bg-gradient-to-r from-red-50 to-orange-50">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Found a Security Issue?</h2>
                <p class="text-gray-700 mb-4">
                    If you discover a security vulnerability, please email us at <strong>security@gabbitot.com</strong> instead of posting publicly. We appreciate your responsible disclosure and will address the issue promptly.
                </p>
                <a href="{{ route('contact') }}" class="inline-block px-6 py-2 bg-red-500 text-white rounded-lg font-bold hover:bg-red-600 transition">
                    Report Security Issue
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
