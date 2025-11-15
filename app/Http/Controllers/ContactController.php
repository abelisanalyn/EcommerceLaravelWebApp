<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'contact_method' => 'required|string|in:Email,Phone,Messenger',
            'message' => 'required|string|max:5000',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA
        $recaptchaToken = $request->input('g-recaptcha-response');
        $secretKey = config('services.recaptcha.secret_key');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaToken,
        ]);

        $recaptchaResult = $response->json();

        // Check if reCAPTCHA verification was successful
        if (!$recaptchaResult['success'] || $recaptchaResult['score'] < 0.5) {
            return back()
                ->withInput()
                ->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
        }

        // Send email to admin
        try {
            Mail::raw(
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Subject: {$validated['subject']}\n" .
                "Preferred Contact: {$validated['contact_method']}\n\n" .
                "Message:\n{$validated['message']}",
                function ($message) use ($validated) {
                    $message->to(config('mail.from.address'))
                        ->subject("New Contact Form Submission: {$validated['subject']}")
                        ->replyTo($validated['email']);
                }
            );

            // Send confirmation email to user
            Mail::raw(
                "Thank you for contacting us!\n\n" .
                "We've received your message and will get back to you as soon as possible.\n\n" .
                "Best regards,\nTumpang Handbags Team",
                function ($message) use ($validated) {
                    $message->to($validated['email'])
                        ->subject('We received your message - Tumpang Handbags');
                }
            );
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Failed to send message. Please try again later.']);
        }

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }
}
