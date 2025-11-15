@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section style="text-align: center; padding: 100px 20px; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border-radius: 20px; margin-bottom: 50px; box-shadow: 0 8px 32px rgba(255,107,157,0.2);">
    <h1 style="font-size: 3em; margin-bottom: 10px; color: #ff6b9d; font-weight: 700;">Welcome to Dhana's Apparel! 👶</h1>
    <p style="font-size: 1.3em; color: #ff85b3; font-weight: 600;">💕 Soft, Comfortable & Adorable Baby Clothes & Accessories</p>
    <p style="font-size: 1em; color: #666; margin-top: 10px;">Everything Your Little One Needs with Love & Care</p>
</section>

<!-- Featured Products Section -->
<div class="container">
    <h2 style="text-align: center; margin-bottom: 40px; color: #ff6b9d; font-weight: 700; font-size: 2.2em;">✨ Our Featured Collections ✨</h2>
    <div class="row">
        <!-- Product 1: Soft Cotton Bodysuit -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://m.media-amazon.com/images/I/71RHhlN334L._SX679_.jpg" class="card-img-top" alt="Soft Cotton Bodysuit" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🍼 Soft Cotton Bodysuit</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">100% Organic Cotton - Super Soft & Breathable</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱599</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 2: Cute Onesie Set -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://down-ph.img.susercontent.com/file/241225f5b49dd350e27eda06294d8840.webp" class="card-img-top" alt="Cute Onesie Set" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🎀 Cute Onesie Set (3-Pack)</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Adorable Prints with Comfortable Fit</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱1,299</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 3: Cozy Baby Mittens -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://m.media-amazon.com/images/I/41eydN2NsqL.jpg" class="card-img-top" alt="Cozy Baby Mittens" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🧤 Cozy Baby Mittens (5-Pair)</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Soft & Warm - Prevents Scratching</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱399</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 4: Pastel Beanie Collection -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://i.etsystatic.com/17050014/r/il/566ca3/5386831402/il_1588xN.5386831402_swh7.jpg" class="card-img-top" alt="Pastel Beanies" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🎩 Pastel Beanie Collection (4-Pack)</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Perfect for Little Fashionistas</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱799</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 5: Tiny Socks Bundle -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://dw.cartersstorefront.com/dw/image/v2/AAMK_PRD/on/demandware.static/-/Sites-carters_master_catalog/default/dwc8e15c05/productimages/2R159910.jpg?sfrm=png&bgcolor=F6F6F6&sw=470" class="card-img-top" alt="Tiny Socks" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🧦 Tiny Socks Bundle (10-Pair)</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Non-Slip & Colorful Designs</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱899</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 6: Swaddle Wraps -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: white;">
                <img src="https://snuggletimebaby.co.za/cdn/shop/files/012914573907_2WEB_800x.jpg?v=1718875758" class="card-img-top" alt="Swaddle Wraps" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">🌸 Swaddle Wraps (3-Pack)</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Muslin Cotton - Breathable & Safe</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em;">₱1,099</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>

        <!-- Product 7: Newborn Essential Starter Pack -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm" style="border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border: 2px solid #ff6b9d;">
                <img src="https://m.media-amazon.com/images/I/61jnx+E-TSL._SX679_.jpg" class="card-img-top" alt="Starter Pack" style="height: 250px; object-fit: cover;">
                <div class="card-body text-center" style="padding: 20px;">
                    <h5 class="card-title" style="font-weight: 700; color: #ff6b9d; font-size: 1.2em;">⭐ Newborn Essential Starter Pack</h5>
                    <p style="color: #999; margin: 8px 0; font-size: 0.9em;">Complete Newborn Bundle with Premium Items</p>
                    <p class="card-text" style="color: #ff85b3; font-weight: bold; font-size: 1.3em; margin: 5px 0;">₱2,499</p>
                    <p style="color: #ff6b9d; font-size: 0.85em; font-weight: 600;">💝 BEST VALUE PACKAGE 💝</p>
                    <button class="btn" style="width: 100%; background: linear-gradient(135deg, #ff6b9d, #ff85b3); color: white; border: none; border-radius: 10px; font-weight: 600; padding: 10px;">Add to Cart 🛒</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Section -->
<section style="text-align: center; padding: 40px 20px; margin-top: 50px; background: linear-gradient(135deg, #ffe4e6 0%, #fff9e6 100%); border-radius: 15px;">
    <h3 style="color: #ff6b9d; font-weight: 700; font-size: 1.8em; margin-bottom: 15px;">Why Choose Dhana's Apparel? 💖</h3>
    <div style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; margin-top: 25px;">
        <div style="flex: 1; min-width: 150px;">
            <p style="font-size: 2em;">🌱</p>
            <p style="font-weight: 600; color: #333;">100% Organic</p>
            <p style="color: #666; font-size: 0.9em;">Safe for baby skin</p>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <p style="font-size: 2em;">✨</p>
            <p style="font-weight: 600; color: #333;">High Quality</p>
            <p style="color: #666; font-size: 0.9em;">Premium Materials</p>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <p style="font-size: 2em;">💝</p>
            <p style="font-weight: 600; color: #333;">Affordable</p>
            <p style="color: #666; font-size: 0.9em;">Best Prices in Town</p>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <p style="font-size: 2em;">🚚</p>
            <p style="font-weight: 600; color: #333;">Fast Shipping</p>
            <p style="color: #666; font-size: 0.9em;">Delivery in 2-3 Days</p>
        </div>
    </div>
</section>

@endsection
