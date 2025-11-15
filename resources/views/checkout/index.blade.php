@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">
    <h2 class="mb-4">Checkout</h2>

    <div class="row">
        <!-- Checkout Form -->
        <div class="col-md-8">
            <form action="{{ route('checkout.place') }}" method="POST" id="checkout-form">
                @csrf

                <!-- Shipping Information -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Shipping Information</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="shipping_name" class="form-label">Full Name *</label>
                            <input id="shipping_name" type="text" name="shipping_name" class="form-control @error('shipping_name') is-invalid @enderror" value="{{ old('shipping_name', auth()->user()->name ?? '') }}" required autofocus>
                            @error('shipping_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Street Address *</label>
                            <input id="shipping_address" type="text" name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" value="{{ old('shipping_address') }}" required>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="shipping_city" class="form-label">City *</label>
                            <input id="shipping_city" type="text" name="shipping_city" class="form-control @error('shipping_city') is-invalid @enderror" value="{{ old('shipping_city') }}" required>
                            @error('shipping_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="shipping_phone" class="form-label">Phone Number *</label>
                            <input id="shipping_phone" type="tel" name="shipping_phone" class="form-control @error('shipping_phone') is-invalid @enderror" value="{{ old('shipping_phone') }}" required>
                            @error('shipping_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Method Notice -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Payment Method</h5>
                        <div class="alert alert-info mb-0">
                            <p class="mb-0"><strong>Cash on Delivery:</strong> Pay when you receive your order. No payment is required at checkout.</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary flex-grow-1">Back to Cart</a>
                    <button type="submit" class="btn btn-dark flex-grow-1">Place Order</button>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-md-4">
            <div class="card shadow-sm position-sticky" style="top: 20px;">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>

                    @php
                        $cart = session()->get('cart', []);
                        $cartItems = [];
                        $subtotal = 0;
                        
                        foreach ($cart as $productId => $quantity) {
                            $product = \App\Models\Product::find($productId);
                            if ($product) {
                                $itemTotal = $product->price * $quantity;
                                $cartItems[] = [
                                    'product' => $product,
                                    'quantity' => $quantity,
                                    'subtotal' => $itemTotal,
                                ];
                                $subtotal += $itemTotal;
                            }
                        }
                    @endphp

                    <div class="mb-4 pb-4 border-bottom">
                        @foreach($cartItems as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">{{ $item['product']->name }}</span>
                                <span>₱{{ number_format($item['subtotal'], 2) }}</span>
                            </div>
                            <div class="text-muted small">Qty: {{ $item['quantity'] }} × ₱{{ number_format($item['product']->price, 2) }}</div>
                        @endforeach
                    </div>

                    <div class="mb-4 pb-4 border-bottom">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>₱{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span class="text-success fw-semibold">Free</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax (12%):</span>
                            <span>₱{{ number_format($subtotal * 0.12, 2) }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total:</strong>
                        <strong class="text-danger" style="font-size: 1.2rem;">₱{{ number_format($subtotal * 1.12, 2) }}</strong>
                    </div>

                    <div class="alert alert-success mb-0">
                        <p class="mb-0"><small>✓ Secure Checkout - Your information is safe</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
