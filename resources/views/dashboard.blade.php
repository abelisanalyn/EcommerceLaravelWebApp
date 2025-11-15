@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 30px;">
                <h1 style="color: #333; margin: 0;">Welcome, {{ Auth::user()->name }}! 👋</h1>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="btn" style="background-color: #d63384; color: white; font-weight: 600;">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- My Orders Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; height: 100%;">
                <div class="card-body text-center p-5">
                    <div style="font-size: 3em; margin-bottom: 15px;">📦</div>
                    <h4 class="card-title" style="color: #333; font-weight: 600;">My Orders</h4>
                    <p class="card-text" style="color: #666; margin-bottom: 20px;">View and track all your orders</p>
                    <a href="#orders" class="btn" style="background-color: #d63384; color: white; font-weight: 600; width: 100%;">
                        View Orders
                    </a>
                </div>
            </div>
        </div>

        <!-- Wishlist Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; height: 100%;">
                <div class="card-body text-center p-5">
                    <div style="font-size: 3em; margin-bottom: 15px;">❤️</div>
                    <h4 class="card-title" style="color: #333; font-weight: 600;">Wishlist</h4>
                    <p class="card-text" style="color: #666; margin-bottom: 20px;">Your favorite handbags</p>
                    <a href="#wishlist" class="btn" style="background-color: #d63384; color: white; font-weight: 600; width: 100%;">
                        View Wishlist
                    </a>
                </div>
            </div>
        </div>

        <!-- Account Settings Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; height: 100%;">
                <div class="card-body text-center p-5">
                    <div style="font-size: 3em; margin-bottom: 15px;">⚙️</div>
                    <h4 class="card-title" style="color: #333; font-weight: 600;">Account Settings</h4>
                    <p class="card-text" style="color: #666; margin-bottom: 20px;">Manage your profile information</p>
                    <a href="#settings" class="btn" style="background-color: #d63384; color: white; font-weight: 600; width: 100%;">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- User Information Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-lg" style="border: none; border-radius: 15px;">
                <div class="card-header" style="background-color: #b87373; color: white; border-radius: 15px 15px 0 0;">
                    <h5 class="mb-0" style="font-weight: 600;">Account Information</h5>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <p style="color: #666;">
                                <strong style="color: #333;">Name:</strong><br>
                                {{ Auth::user()->name }}
                            </p>
                            <p style="color: #666; margin-top: 15px;">
                                <strong style="color: #333;">Email:</strong><br>
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p style="color: #666;">
                                <strong style="color: #333;">Member Since:</strong><br>
                                {{ Auth::user()->created_at->format('F d, Y') }}
                            </p>
                            <p style="color: #666; margin-top: 15px;">
                                <strong style="color: #333;">Last Updated:</strong><br>
                                {{ Auth::user()->updated_at->format('F d, Y \a\t h:i A') }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="#change-password" class="btn btn-sm" style="background-color: #d63384; color: white; font-weight: 600; margin-right: 10px;">
                            Change Password
                        </a>
                        <a href="#delete-account" class="btn btn-sm btn-danger" style="font-weight: 600;">
                            Delete Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="card shadow-lg" style="border: none; border-radius: 15px;">
                <div class="card-header" style="background-color: #b87373; color: white; border-radius: 15px 15px 0 0;">
                    <h5 class="mb-0" style="font-weight: 600;">Quick Links</h5>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/product') }}" class="btn btn-outline-dark w-100 mb-3" style="font-weight: 600;">
                                🛍️ Continue Shopping
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/contact') }}" class="btn btn-outline-dark w-100 mb-3" style="font-weight: 600;">
                                💬 Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
