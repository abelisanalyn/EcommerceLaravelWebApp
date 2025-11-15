<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - GabbiToT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-[#2C2C2C]" style="background-color: #F5F1ED; background-image: repeating-linear-gradient(90deg, transparent, transparent 2px, rgba(0, 0, 0, 0.02) 2px, rgba(0, 0, 0, 0.02) 4px), repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0, 0, 0, 0.02) 2px, rgba(0, 0, 0, 0.02) 4px); background-attachment: fixed;">
    <style>
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0, 82, 204, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -20%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 82, 204, 0.03) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        nav, main, footer {
            position: relative;
            z-index: 10;
        }
    </style>
    <!-- Navigation -->
    <nav class="shadow-lg sticky top-0 z-50" style="background-color: #1e293b; border-bottom: 1px solid #334155;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-2">
                        <span class="text-3xl">🍽️</span>
                        <span class="text-xl font-bold text-white">GabbiToT</span>
                    </a>
                    <div class="hidden md:flex items-center gap-6">
                        <a href="{{ route('shop.index') }}" class="text-gray-200 hover:text-white font-medium transition">Shop</a>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('cart.index') }}" class="relative text-gray-200 hover:text-white font-medium transition">
                        🛒 Cart
                        @php
                            $cartCount = array_sum(session('cart', []));
                        @endphp
                        @if($cartCount > 0)
                            <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-200 hover:text-white font-medium transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-200 hover:text-white font-medium transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-200 hover:text-white font-medium transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">✨ Welcome to Our Shop ✨</h1>
            <p class="text-xl opacity-90">Discover premium meal kits crafted with care</p>
        </div>
    </div>

    <!-- Shop Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if (session('success'))
            <div class="mb-8 p-4 bg-green-100 text-green-800 rounded-lg border border-green-300">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-8 p-4 bg-red-100 text-red-800 rounded-lg border border-red-300">
                ✗ {{ session('error') }}
            </div>
        @endif

        <h2 class="text-3xl font-bold mb-12">Our Premium Selection</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="text-6xl mb-4">🍽️</div>
                    <p class="text-gray-700 text-lg font-semibold">No products available yet.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p>&copy; 2025 GabbiToT. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
