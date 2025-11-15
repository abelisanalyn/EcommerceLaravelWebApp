@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; margin-top: 40px; margin-bottom: 40px;">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4" style="color: #d63384; font-weight: 600;">Create Your Account</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops!</strong>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-weight: 600; color: #333;">Full Name</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" 
                                   type="text" name="name" value="{{ old('name') }}" required autofocus 
                                   placeholder="Your full name" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-weight: 600; color: #333;">Email Address</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" 
                                   type="email" name="email" value="{{ old('email') }}" required 
                                   placeholder="your@email.com" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-weight: 600; color: #333;">Password</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" 
                                   type="password" name="password" required 
                                   placeholder="At least 8 characters" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                        <label for="password_confirmation" class="form-label" style="font-weight: 600; color: #333;">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" 
                        type="password" name="password_confirmation" required 
                        placeholder="Confirm your password" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                        </div>

                         <!-- reCAPTCHA v2 -->
                        @if(config('services.recaptcha.site_key'))
                            <div class="mb-3" style="display: flex; justify-content: center;">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            </div>
                        @else
                            <div class="alert alert-warning mb-3">
                                <strong>Configuration Notice:</strong> reCAPTCHA is not configured. Please add RECAPTCHA_SITE_KEY to your .env file.
                            </div>
                        @endif
                        @error('g-recaptcha-response')
                            <div class="alert alert-danger mb-3">{{ $message }}</div>
                        @enderror

                        <!-- Register Button -->
                        <button type="submit" class="btn w-100" 
                                style="background-color: #d63384; color: white; font-weight: 600; padding: 12px; border-radius: 8px; border: none; margin-top: 10px;">
                            Register
                        </button>
                    </form>

                    <!-- Link to Login -->
                    <div style="text-align: center; margin-top: 20px;">
                        <p style="color: #555;">
                            Already have an account? <a href="{{ route('login') }}" style="color: #d63384; text-decoration: none; font-weight: 600;">Login here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
