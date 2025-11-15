@extends('layouts.app')

@section('title', 'Shopping Cart - Dhana\'s Apparel')

@section('content')

<!-- Header Section -->
<section style="text-align:center; padding:30px; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border-radius: 15px; margin-bottom: 40px;">
    <h1 style="color:#ff6b9d; font-weight: 700; font-size: 2.2em;">🛒 Your Shopping Cart 🛒</h1>
    <p style="color:#555; margin-top: 10px; font-size: 1.1em;">Review Your Adorable Baby Product Selection</p>
</section>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #c8f5dd 0%, #a0f1d8 100%); border: 2px solid #16a085; color: #0e6251;">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (empty($cartItems))
                <div class="alert alert-info alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border: 2px solid #ff6b9d; color: #ff6b9d;">
                    <strong>💭 Your cart is empty!</strong> <br>
                    Let's fill it with some adorable baby essentials! <a href="{{ route('product') }}" class="alert-link" style="color: #ff6b9d; font-weight: 700;">Continue shopping</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(255,107,157,0.15);">
                        <thead style="background: linear-gradient(135deg, #ff6b9d 0%, #ff85b3 100%); color: white;">
                            <tr>
                                <th style="color: white; font-weight: 700;">👶 Product</th>
                                <th style="color: white; font-weight: 700;">💰 Price</th>
                                <th style="color: white; font-weight: 700;">📦 Quantity</th>
                                <th style="color: white; font-weight: 700;">💵 Subtotal</th>
                                <th style="color: white; font-weight: 700;">⚙️ Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $productId => $item)
                                <tr style="border-bottom: 2px solid #fff0f5;">
                                    <td style="color: #333; font-weight: 600;">{{ $item['product']->name }}</td>
                                    <td style="color: #ff85b3; font-weight: 700;">₱{{ number_format($item['product']->price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-flex gap-2">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm" style="width: 70px; border: 2px solid #ff85b3; border-radius: 8px;">
                                            <button type="submit" class="btn btn-sm" style="background: #ff85b3; color: white; border: none; border-radius: 8px; font-weight: 600;">Update</button>
                                        </form>
                                    </td>
                                    <td style="color: #ff6b9d; font-weight: 700;">₱{{ number_format($item['subtotal'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $productId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background: #ff6b9d; color: white; border: none; border-radius: 8px; font-weight: 600;">Remove ✕</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Cart Summary -->
        <div class="col-md-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; border: 2px solid #ff85b3; overflow: hidden;">
                <div style="background: linear-gradient(135deg, #ff6b9d 0%, #ff85b3 100%); color: white; padding: 20px; text-align: center;">
                    <h5 style="margin: 0; font-weight: 700; font-size: 1.3em;">💝 Order Summary</h5>
                </div>
                <div class="card-body" style="padding: 25px;">
                    
                    @if (!empty($cartItems))
                        <div class="mb-3 pb-3" style="border-bottom: 2px solid #ffe4e6;">
                            <div class="d-flex justify-content-between mb-2" style="color: #555; font-weight: 600;">
                                <span>Subtotal:</span>
                                <span style="color: #ff85b3;">₱{{ number_format($cartTotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2" style="color: #555; font-weight: 600;">
                                <span>🚚 Shipping:</span>
                                <span style="color: #16a085; font-weight: 700;">FREE</span>
                            </div>
                            <div class="d-flex justify-content-between" style="color: #555; font-weight: 600;">
                                <span>Tax (12%):</span>
                                <span style="color: #ff85b3;">₱{{ number_format($cartTotal * 0.12, 2) }}</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-4" style="background: #fff9e6; padding: 15px; border-radius: 10px; border: 2px solid #ffb3d9;">
                            <strong style="color: #ff6b9d; font-size: 1.2em;">Total:</strong>
                            <strong style="color: #ff6b9d; font-size: 1.2em;">₱{{ number_format($cartTotal * 1.12, 2) }}</strong>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="btn w-100 mb-2" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 700; padding: 12px; border-radius: 10px;">✅ Proceed to Checkout</a>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn w-100" style="background: white; color: #ff6b9d; border: 2px solid #ff85b3; font-weight: 700; padding: 12px; border-radius: 10px;">🗑️ Clear Cart</button>
                        </form>
                    @endif

                    <a href="{{ route('product') }}" class="btn w-100 mt-3" style="background: white; color: #ff85b3; border: 2px solid #ff85b3; font-weight: 700; padding: 12px; border-radius: 10px;">🛍️ Continue Shopping</a>
                </div>
            </div>

            <!-- Info Box -->
            <div style="background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); padding: 20px; border-radius: 15px; margin-top: 20px; border: 2px solid #ffb3d9;">
                <p style="color: #ff6b9d; font-weight: 700; margin-bottom: 10px; font-size: 1.1em;">💖 Why Choose Us?</p>
                <ul style="color: #555; font-size: 0.95em; list-style: none; padding: 0;">
                    <li style="margin-bottom: 8px;">✅ 100% Organic Baby Products</li>
                    <li style="margin-bottom: 8px;">✅ Fast 2-3 Day Delivery</li>
                    <li style="margin-bottom: 8px;">✅ Free Shipping Nationwide</li>
                    <li style="margin-bottom: 8px;">✅ Safe & Certified Materials</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
