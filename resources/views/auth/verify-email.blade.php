@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border: none; border-radius: 15px; margin-top: 40px; margin-bottom: 40px;">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4" style="color: #d63384; font-weight: 600;">Verify Your Email</h2>

                    @if (session('resent'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            A fresh verification link has been sent to your email address.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <p style="color: #555; text-align: center; margin-bottom: 20px;">
                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email, we will gladly send you another.
                    </p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn w-100" 
                                style="background-color: #d63384; color: white; font-weight: 600; padding: 12px; border-radius: 8px; border: none;">
                            Resend Verification Email
                        </button>
                    </form>

                    <!-- Logout -->
                    <div style="text-align: center; margin-top: 20px;">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: #d63384; text-decoration: underline; cursor: pointer; font-weight: 600;">
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
