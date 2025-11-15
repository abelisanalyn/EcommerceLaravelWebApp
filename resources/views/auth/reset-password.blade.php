@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; margin-top: 40px; margin-bottom: 40px;">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4" style="color: #d63384; font-weight: 600;">Create New Password</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops!</strong>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-weight: 600; color: #333;">Email Address</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" 
                                   type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus 
                                   style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-weight: 600; color: #333;">New Password</label>
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

                        <!-- Reset Button -->
                        <button type="submit" class="btn w-100" 
                                style="background-color: #d63384; color: white; font-weight: 600; padding: 12px; border-radius: 8px; border: none;">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
