@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; margin-top: 40px; margin-bottom: 40px;">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4" style="color: #d63384; font-weight: 600;">Reset Your Password</h2>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops!</strong>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <p style="color: #555; text-align: center; margin-bottom: 30px;">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: 600; color: #333;">Email Address</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" 
                        type="email" name="email" value="{{ old('email') }}" required autofocus 
                        placeholder="your@email.com" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
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

                        <!-- Send Button -->
                        <button type="submit" class="btn w-100" 
                                style="background-color: #d63384; color: white; font-weight: 600; padding: 12px; border-radius: 8px; border: none;">
                            Send Password Reset Link
                        </button>
                    </form>

                    <!-- Back to Login -->
                    <div style="text-align: center; margin-top: 20px;">
                        <p style="color: #555;">
                            <a href="{{ route('login') }}" style="color: #d63384; text-decoration: none; font-weight: 600;">Back to Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
