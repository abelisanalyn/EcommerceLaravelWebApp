<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital@0;1&display=swap" rel="stylesheet" />

        <style>
            * {
                scroll-behavior: smooth;
            }

            body {
                background-color: #F5F1ED;
                background-image: 
                    repeating-linear-gradient(
                        90deg,
                        transparent,
                        transparent 2px,
                        rgba(0, 0, 0, 0.02) 2px,
                        rgba(0, 0, 0, 0.02) 4px
                    ),
                    repeating-linear-gradient(
                        0deg,
                        transparent,
                        transparent 2px,
                        rgba(0, 0, 0, 0.02) 2px,
                        rgba(0, 0, 0, 0.02) 4px
                    );
                background-attachment: fixed;
                min-height: 100vh;
                font-family: 'Figtree', sans-serif;
            }

            .font-script {
                font-family: 'Cormorant Garamond', serif;
                font-size: 3rem;
                font-weight: 400;
                font-style: italic;
                letter-spacing: 0.08em;
            }

            .gold-accent {
                color: #0052CC;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card-luxury {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 215, 0, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.5);
                transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }

            .card-luxury:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 48px rgba(255, 215, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.5);
                border-color: rgba(255, 215, 0, 0.4);
            }

            .logo-container {
                text-align: center;
                margin-bottom: 2rem;
            }

            .logo-container svg {
                width: 60px;
                height: 60px;
                filter: drop-shadow(0 4px 8px rgba(0, 82, 204, 0.3));
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                margin-bottom: 0.5rem;
                color: #2C2C2C;
                font-weight: 600;
                font-size: 0.875rem;
                letter-spacing: 0.5px;
            }

            .form-input {
                width: 100%;
                padding: 0.75rem 1rem;
                border: 2px solid rgba(0, 82, 204, 0.2);
                border-radius: 0.75rem;
                background: rgba(255, 255, 255, 0.9);
                color: #2C2C2C;
                transition: all 0.3s ease;
                font-size: 0.95rem;
            }

            .form-input:focus {
                outline: none;
                border-color: #0052CC;
                box-shadow: 0 0 0 3px rgba(0, 82, 204, 0.1);
                background: #ffffff;
            }

            .form-input::placeholder {
                color: #999;
            }

            .btn-primary {
                display: inline-block;
                padding: 0.875rem 2rem;
                background: #0052CC;
                color: white;
                font-weight: 700;
                border: none;
                border-radius: 0.75rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                text-align: center;
                width: 100%;
                font-size: 1rem;
                letter-spacing: 0.5px;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(0, 82, 204, 0.2);
                background: #003d99;
            }

            .btn-primary:active {
                transform: translateY(0);
            }

            .text-link {
                color: #0052CC;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .text-link:hover {
                color: #003d99;
                text-decoration: underline;
            }

            .form-divider {
                text-align: center;
                margin: 1.5rem 0;
                color: #999;
                font-size: 0.875rem;
            }

            .error-text {
                color: #ef4444;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }

            .success-text {
                color: #10b981;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }

            .section-title {
                font-family: 'Playfair Display', serif;
                font-size: 2rem;
                font-weight: 900;
                letter-spacing: -1px;
                color: #1a1a2e;
                margin-bottom: 0.5rem;
            }

            .subtitle {
                color: #666;
                font-size: 0.95rem;
                margin-bottom: 2rem;
            }

            .checkbox-container {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
            }

            .checkbox-container input[type="checkbox"] {
                width: 1.25rem;
                height: 1.25rem;
                border: 2px solid rgba(0, 82, 204, 0.3);
                border-radius: 0.375rem;
                cursor: pointer;
                accent-color: #0052CC;
            }

            .checkbox-label {
                color: #666;
                font-size: 0.875rem;
                cursor: pointer;
                flex: 1;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @stack('head-scripts')
    </head>
    <body class="font-sans antialiased" x-data>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 py-12">
            <div class="logo-container">
                <a href="/">
                    <x-application-logo class="inline-block" />
                </a>
                <h1 class="font-script gold-accent mt-4">GX'BAG</h1>
                <p class="text-gray-600 text-sm mt-2 uppercase tracking-wider">Grayxie's Bag</p>
            </div>

            <div class="w-full sm:max-w-md card-luxury rounded-2xl overflow-hidden">
                <div class="p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
