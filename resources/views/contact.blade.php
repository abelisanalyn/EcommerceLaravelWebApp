@extends('layouts.app')

@section('title', 'Contact Us - Dhana\'s Apparel')

@section('content')

<section style="text-align:center; padding:40px; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); border-radius: 15px; margin-bottom: 40px;">
    <h1 style="color:#ff6b9d; font-weight: 700; font-size: 2.3em;">Get in Touch with Us 💌</h1>
    <p style="color:#555; max-width:700px; margin:auto; font-size: 1.1em; line-height: 1.6;">
        Have questions about our adorable baby products? Need sizing help? We'd love to hear from you! Our friendly team is here to help and will get back to you as soon as possible.
    </p>
</section>

<!-- 🔹 CONTACT FORM -->
<form method="POST" action="{{ route('contact.submit') }}" style="display:flex; flex-direction:column; gap:15px; max-width:600px; margin:30px auto; background: linear-gradient(135deg, #ffe4e6 0%, #fff9e6 100%); padding:30px; border-radius:15px; box-shadow:0 8px 20px rgba(255,107,157,0.2);">
    @csrf

    <label for="name" style="font-weight:700; color: #ff6b9d;">👶 Full Name</label>
    <input type="text" id="name" name="name" placeholder="Your Name" required style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;">

    <label for="email" style="font-weight:700; color: #ff6b9d;">💌 Email Address</label>
    <input type="email" id="email" name="email" placeholder="your@email.com" required style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;">

    <label for="phone" style="font-weight:700; color: #ff6b9d;">📱 Phone Number</label>
    <input type="tel" id="phone" name="phone" placeholder="+63 912 345 6789" style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;">

    <label for="subject" style="font-weight:700; color: #ff6b9d;">📝 What Can We Help With?</label>
    <select id="subject" name="subject" style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;">
        <option>Product Questions</option>
        <option>Sizing Help</option>
        <option>Order Status</option>
        <option>Return/Exchange</option>
        <option>Collaboration</option>
        <option>General Feedback</option>
        <option>Other</option>
    </select>

    <label for="contact_method" style="font-weight:700; color: #ff6b9d;">📞 How Should We Contact You?</label>
    <select id="contact_method" name="contact_method" style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;">
        <option>Email</option>
        <option>Phone</option>
        <option>Messenger</option>
    </select>

    <label for="message" style="font-weight:700; color: #ff6b9d;">💭 Your Message</label>
    <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help your little one's needs..." required style="padding:12px; border-radius:8px; border:2px solid #ff85b3; font-family: 'Fredoka', sans-serif;"></textarea>

    <!-- reCAPTCHA v2 -->
    @if(config('services.recaptcha.site_key'))
        <div style="display: flex; justify-content: center; margin: 15px 0;">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        </div>
    @else
        <div style="background:#fff9e6; border:2px solid #ffc0d9; color:#ff6b9d; padding:12px; border-radius:8px; margin:15px 0; font-weight: 600;">
            <strong>Note:</strong> reCAPTCHA is not configured. Please add RECAPTCHA_SITE_KEY to your .env file.
        </div>
    @endif
    @error('g-recaptcha-response')
        <div style="background:#ffe4e6; border:2px solid #ff6b9d; color:#ff6b9d; padding:12px; border-radius:8px; margin:15px 0; font-weight: 600;">
            {{ $message }}
        </div>
    @enderror

    <button type="submit" style="background: linear-gradient(135deg, #ff6b9d, #ff85b3); color:#fff; border:none; padding:12px; border-radius:8px; font-weight:700; cursor:pointer; font-family: 'Fredoka', sans-serif; font-size: 1.1em;">
        Send Message 💌
    </button>
</form>

<!-- 🔹 STORE INFO -->
<section style="text-align:center; margin-top:50px; background: linear-gradient(135deg, #fff9e6 0%, #ffe4e6 100%); padding:40px; border-radius:15px;">
    <h2 style="color:#ff6b9d; font-weight: 700; font-size: 2em;">Visit Dhana's Apparel 👶</h2>

    <p style="color:#555; margin-top: 10px; font-size: 1.1em;">🕓 Monday – Friday: 9:00 AM – 5:00 PM</p>
    <p style="color:#555; margin-top: 10px; font-size: 1.1em;">Saturday: 10:00 AM – 4:00 PM</p>
    <p style="color:#666; margin-top: 15px; font-size: 0.95em;">Sunday: Closed (Rest day) 💤</p>

</section>



<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
