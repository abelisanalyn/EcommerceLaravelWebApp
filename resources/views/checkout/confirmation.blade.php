@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Success Message -->
            <div class="alert alert-success text-center py-5 mb-4">
                <h3 class="text-success mb-3" style="font-size: 3rem;">✓</h3>
                <h2 class="mb-2">Order Placed Successfully!</h2>
                <p class="text-muted mb-2">Thank you for your purchase</p>
                <p class="h4 text-danger">Order #{{ $order->id }}</p>
            </div>

            <div class="row">
                <!-- Order Info -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Order Details</h5>
                            <hr>
                            <p class="mb-2">
                                <strong>Order Date:</strong><br>
                                {{ $order->created_at->format('M d, Y \a\t h:i A') }}
                            </p>
                            <p class="mb-2">
                                <strong>Status:</strong><br>
                                <span class="badge bg-primary">{{ ucfirst($order->status) }}</span>
                            </p>
                            <p class="mb-0">
                                <strong>Total Amount:</strong><br>
                                <span class="h5 text-danger">₱{{ number_format($order->total, 2) }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Shipping Address</h5>
                            <hr>
                            <p class="mb-1"><strong>{{ $order->shipping_name }}</strong></p>
                            <p class="mb-1">{{ $order->shipping_address }}</p>
                            <p class="mb-1">{{ $order->shipping_city }}</p>
                            <p class="mb-0"><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr style="border-bottom: 2px solid #dee2e6;">
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                        <td class="text-end">₱{{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No items in this order.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Subtotal:</td>
                                    <td class="text-end">₱{{ number_format($order->subtotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Tax (12%):</td>
                                    <td class="text-end">₱{{ number_format($order->tax, 2) }}</td>
                                </tr>
                                <tr style="border-top: 2px solid #dee2e6; font-weight: bold; font-size: 1.1rem;">
                                    <td>Total:</td>
                                    <td class="text-end text-danger">₱{{ number_format($order->total, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ route('product') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                <a href="{{ route('home') }}" class="btn btn-dark">Back to Home</a>
            </div>

            <!-- Message -->
            <div class="alert alert-info mt-5" style="background-color: #e7f3ff; border: 1px solid #b3d9ff;">
                <p class="mb-0"><strong>Thank you for your order!</strong> You will receive an email confirmation shortly with tracking information.</p>
            </div>

        </div>
    </div>
</div>

@endsection
