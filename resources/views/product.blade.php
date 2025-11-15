@extends('layouts.app')

@section('content')

<!-- Header Section -->
<section style="text-align:center; padding:30px; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border-radius: 15px; margin-bottom: 40px;">
    <h1 style="color:#ff6b9d; font-weight: 700; font-size: 2.2em;">🍼 All Baby Collections 👶</h1>
    <p style="color:#555; margin-top: 10px; font-size: 1.1em;">Browse Our Adorable Baby Products</p>
</section>

<!-- Product Carousel Section -->
<div class="container py-5 position-relative">

    <button class="carousel-btn left-btn btn position-absolute top-50 start-0 translate-middle-y" style="width: 40px; height: 80px; opacity: 0.7; z-index: 10; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none;">‹</button>
    <button class="carousel-btn right-btn btn position-absolute top-50 end-0 translate-middle-y" style="width: 40px; height: 80px; opacity: 0.7; z-index: 10; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none;">›</button>

    <div class="product-carousel d-flex flex-row flex-nowrap overflow-hidden gap-3">

        <!-- CARD 1: Soft Cotton Bodysuit -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://m.media-amazon.com/images/I/71RHhlN334L._SX679_.jpg" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🍼 Soft Cotton Bodysuit</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱599</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 2: Cute Onesie Set -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="2">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://down-ph.img.susercontent.com/file/241225f5b49dd350e27eda06294d8840.webp" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🎀 Cute Onesie Set (3-Pack)</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱1,299</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 3: Cozy Baby Mittens -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="3">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://m.media-amazon.com/images/I/41eydN2NsqL.jpg" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🧤 Cozy Baby Mittens (5-Pair)</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱399</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 4: Pastel Beanie Collection -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="4">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://i.etsystatic.com/17050014/r/il/566ca3/5386831402/il_1588xN.5386831402_swh7.jpg" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🎩 Pastel Beanie Collection (4-Pack)</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱799</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 5: Tiny Socks Bundle -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="5">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://dw.cartersstorefront.com/dw/image/v2/AAMK_PRD/on/demandware.static/-/Sites-carters_master_catalog/default/dwc8e15c05/productimages/2R159910.jpg?sfrm=png&bgcolor=F6F6F6&sw=470" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🧦 Tiny Socks Bundle (10-Pair)</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱899</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 6: Swaddle Wraps -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="6">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; cursor: pointer; height: 100%;">
                <img src="https://snuggletimebaby.co.za/cdn/shop/files/012914573907_2WEB_800x.jpg?v=1718875758" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">🌸 Swaddle Wraps (3-Pack)</h6>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱1,099</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

        <!-- CARD 7: Newborn Essential Starter Pack -->
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="min-width:250px;">
            @csrf
            <input type="hidden" name="product_id" value="7">
            <input type="hidden" name="quantity" value="1">
            <div class="card shadow-sm border-0 product-card" style="min-width:250px; border-radius: 15px; border: 2px solid #ff6b9d; cursor: pointer; height: 100%;">
                <img src="https://m.media-amazon.com/images/I/61jnx+E-TSL._SX679_.jpg" class="card-img-top" style="height:250px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body text-center">
                    <h6 class="fw-semibold" style="color: #ff6b9d;">⭐ Newborn Essential Starter Pack</h6>
                    <p style="color: #ff6b9d; font-size: 0.85em; font-weight: 600;">💝 BEST VALUE 💝</p>
                    <p class="fw-bold mb-1" style="color: #ff85b3; font-size: 1.3em;">₱2,499</p>
                    <button type="submit" class="btn btn-sm w-100 add-to-cart-btn" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; font-weight: 600;">Add to Cart 🛒</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

<style>
.product-card {
    transition: transform 0.3s, box-shadow 0.3s;
    border-radius: 15px;
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(255,107,157,0.3) !important;
}

.product-card img {
    transition: opacity 0.3s;
}

.product-card:hover img {
    opacity: 0.9;
}

.carousel-btn:hover {
    opacity: 1 !important;
}

.product-carousel {
    scroll-behavior: smooth;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const leftBtn = document.querySelector('.left-btn');
    const rightBtn = document.querySelector('.right-btn');
    const carousel = document.querySelector('.product-carousel');

    leftBtn.onclick = () => carousel.scrollBy({ left: -260, behavior: 'smooth' });
    rightBtn.onclick = () => carousel.scrollBy({ left: 260, behavior: 'smooth' });
});
</script>
