<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GX'BAG Grayxie's Bag</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=playfair-display:700,800,900&family=georgia:400,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-feature-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}}@layer components;@layer utilities{.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#0a0a0a\]{background-color:#0a0a0a}.text-\[\#1b1b18\]{color:#1b1b18}.flex{display:flex}.min-h-screen{min-height:100vh}.p-6{padding:1.5rem}.p-8{padding:2rem}.items-center{align-items:center}.justify-center{justify-content:center}}@media (prefers-color-scheme:dark){.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}}
            </style>
        @endif
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-30px) rotate(5deg); }
            }
            
            @keyframes glow {
                0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4), 0 0 40px rgba(59, 130, 246, 0.2); }
                50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 80px rgba(59, 130, 246, 0.3); }
            }

            @keyframes shimmer {
                0% { background-position: -1000px 0; }
                100% { background-position: 1000px 0; }
            }

            @keyframes slideUp {
                from { 
                    opacity: 0;
                    transform: translateY(40px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes scaleIn {
                from {
                    opacity: 0;
                    transform: scale(0.9);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            body {
                overflow-x: hidden;
            }

            .float-icon {
                animation: float 4s ease-in-out infinite;
            }

            .glow-text {
                animation: glow 3s ease-in-out infinite;
                text-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            .shimmer-btn {
                background-size: 1000px 100%;
                animation: shimmer 3s infinite;
            }

            .slide-up {
                animation: slideUp 0.8s ease-out forwards;
            }

            .slide-up:nth-child(1) { animation-delay: 0.1s; }
            .slide-up:nth-child(2) { animation-delay: 0.2s; }
            .slide-up:nth-child(3) { animation-delay: 0.3s; }
            .slide-up:nth-child(4) { animation-delay: 0.4s; }

            .scale-in {
                animation: scaleIn 0.8s ease-out;
            }

            .hero-title {
                font-family: 'Georgia', serif;
                letter-spacing: -0.02em;
                font-weight: 900;
            }

            .premium-badge {
                background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
                box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4);
            }

            .btn-premium {
                position: relative;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .btn-premium::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                transition: left 0.5s;
            }

            .btn-premium:hover::before {
                left: 100%;
            }

            .btn-premium:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
            }

            .decorative-circle {
                position: absolute;
                border-radius: 50%;
                opacity: 0.1;
            }

            .circle-1 {
                width: 300px;
                height: 300px;
                background: linear-gradient(135deg, #3B82F6, #FCD34D);
                top: -150px;
                right: -150px;
                animation: float 8s ease-in-out infinite;
            }

            .circle-2 {
                width: 200px;
                height: 200px;
                background: linear-gradient(135deg, #F59E0B, #3B82F6);
                bottom: -100px;
                left: -100px;
                animation: float 10s ease-in-out infinite reverse;
            }
        </style>
    </head>
    <body class="text-gray-100 flex items-center justify-center min-h-screen relative overflow-hidden" style="background: linear-gradient(135deg, #0F172A 0%, #1E3A8A 50%, #1F2937 100%);">
        <!-- Decorative Elements -->
        <div class="decorative-circle circle-1" style="background: linear-gradient(135deg, #1E40AF, #3B82F6); opacity: 0.05;"></div>
        <div class="decorative-circle circle-2" style="background: linear-gradient(135deg, #1E40AF, #60A5FA); opacity: 0.05;"></div>

        <!-- Content -->
        <div class="relative z-10 w-full max-w-2xl px-6 py-12">
            <!-- Main Content -->
            <div class="text-center space-y-8">
                
                <!-- Emoji Icon -->
                <div class="scale-in">
                    <div class="text-8xl mb-6 inline-block animate-bounce">🍽️</div>
                </div>

                <!-- Premium Badge -->
                <div class="slide-up">
                    <div class="inline-block premium-badge px-6 py-2 rounded-full text-sm font-bold text-white uppercase tracking-widest">
                        Premium Culinary Experience
                    </div>
                </div>

                <!-- Main Title -->
                <div class="slide-up">
                    <h1 class="hero-title text-6xl lg:text-7xl text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-200 to-cyan-400 leading-none mb-2">
                        GX'BAG
                    </h1>
                    <div class="h-1.5 w-32 bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-300 mx-auto rounded-full mt-6"></div>
                </div>

                <!-- Subtitle -->
                <div class="slide-up">
                    <p class="text-6xl lg:text-7xl font-serif text-gray-200 italic leading-snug">
                        Grayxie's Bag
                    </p>
                </div>

                <!-- Tagline -->
                <div class="slide-up">
                    <p class="text-xl lg:text-2xl text-gray-300 font-light max-w-lg mx-auto leading-relaxed">
                        This thing could <span class="font-bold text-blue-300">impress</span> or <span class="font-bold text-cyan-300">unfazed</span> you with <span class="font-bold text-blue-300">ease</span>.
                    </p>
                </div>

                <!-- Divider -->
                <div class="slide-up">
                    <div class="flex items-center justify-center gap-4">
                        <div class="h-px w-12 bg-gradient-to-r from-transparent to-blue-400"></div>
                        <div class="text-2xl">✨</div>
                        <div class="h-px w-12 bg-gradient-to-l from-transparent to-cyan-400"></div>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="slide-up pt-4 space-y-4 max-w-sm mx-auto">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-premium w-full block text-center bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg shadow-blue-400/40 transition-all">
                            Go to Dashboard
                            <span class="ml-2">→</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-premium w-full block text-center bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg shadow-blue-400/40 transition-all">
                            Log In
                            <span class="ml-2">→</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn-premium w-full block text-center border-2 border-blue-400 text-blue-300 hover:bg-blue-900/50 px-8 py-4 rounded-full font-bold text-lg transition-all hover:border-blue-300 hover:shadow-lg hover:shadow-blue-500/50">
                            Create Account
                            <span class="ml-2">+</span>
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </body>
</html>
