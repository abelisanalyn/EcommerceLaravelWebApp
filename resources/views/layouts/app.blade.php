<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dhana\'s Apparel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Fredoka', sans-serif;
            background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%);
            min-height: 100vh;
        }

        nav a {
            transition: color 0.3s ease;
            font-weight: 600;
        }

        nav a:hover {
            color: #ff6b9d !important;
            transform: scale(1.05);
        }

        footer {
            background: linear-gradient(135deg, #ff6b9d 0%, #ffb3d9 100%);
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 0.9em;
            margin-top: 50px;
            font-weight: 600;
        }

        .cute-text {
            font-weight: 700;
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="antialiased">

    {{-- 🔹 Navigation Bar --}}
    <nav class="shadow-md" style="background: linear-gradient(135deg, #ff6b9d 0%, #ff85b3 100%); padding: 15px 0;">
        <div class="max-w-7xl mx-auto px-6 py-2 d-flex justify-content-between align-items-center" style="display: flex; justify-content: space-between; align-items: center;">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="text-white" style="text-decoration: none; font-size: 1.8em; font-weight: bold; letter-spacing: 1px;">🍼 Dhana's Apparel</a>

            {{-- Menu Links --}}
            <div class="d-none d-sm-flex" style="display: flex; gap: 2rem; color: white; font-weight: 600;">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? '' : '' }}" style="color: white; text-decoration: none;">🏠 Home</a>
                <a href="{{ url('/product') }}" class="{{ request()->is('product') ? '' : '' }}" style="color: white; text-decoration: none;">👶 Products</a>
                <a href="{{ url('/about') }}" class="{{ request()->is('about') ? '' : '' }}" style="color: white; text-decoration: none;">ℹ️ About</a>
                <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? '' : '' }}" style="color: white; text-decoration: none;">💬 Contact</a>
            </div>

            {{-- Cart + Auth Section --}}
            <div style="display: flex; gap: 1.5rem; align-items: center;">
                <a href="{{ url('/cart') }}" class="d-flex align-items-center" style="color: white; text-decoration: none; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-1" style="width: 20px; height: 20px; margin-right: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.3 5.2A1 1 0 007 20h10a1 1 0 001-.8L20 13z" />
                    </svg>
                    <span class="d-none d-sm-inline">🛒 Cart</span>
                </a>

                {{-- Auth Links --}}
                @auth
                    <span style="color: white; font-weight: 600;">👋 {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; color: white; cursor:pointer; font-weight: 600;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="color: white; text-decoration: none; font-weight: 600;">Login</a>
                    <a href="{{ route('register') }}" style="color: white; text-decoration: none; font-weight: 600;">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- 🔹 Title Section Under Navbar --}}
    <div style="background: linear-gradient(135deg, #ff85b3 0%, #ffc0d9 100%); text-align: center; padding: 30px 10px; border-radius: 0 0 20px 20px;">
        <h1 class="cute-text" style="font-size: 32px; color: white; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">✨ Premium Baby & Kids Collection ✨</h1>
        <p style="color: white; margin-top: 8px; font-size: 1.1em;">Quality & Comfort for Your Little Ones</p>
    </div>

    {{-- 🔹 Page Content --}}
    <main style="max-width: 1280px; margin: 0 auto; padding: 2rem 1rem;">
        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    <footer>
        © 2025 Dhana's Apparel | Designed with 💕 for Little Angels | All Rights Reserved
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
