<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\Password;

class NewPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'g-recaptcha-response' => [
                'required',
                function ($attribute, $value, $fail) {
                    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => config('captcha.secret'),
                        'response' => $value,
                        'remoteip' => $this->ip(),
                    ]);

                    $body = $response->json();

                    if (empty($body['success']) || $body['success'] !== true) {
                        $fail('reCAPTCHA verification failed. Please try again.');
                    }
                },
            ],
            'puzzle_verification_token' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $verificationData = Cache::get("puzzle_verified_{$value}");
                    
                    if (!$verificationData || !is_array($verificationData)) {
                        $fail('Please complete the puzzle verification.');
                        return;
                    }

                    // Verify the verification is recent (within last 5 minutes)
                    if (now()->timestamp - $verificationData['verified_at'] > 300) {
                        Cache::forget("puzzle_verified_{$value}");
                        $fail('Puzzle verification expired. Please verify again.');
                        return;
                    }

                    // Verify the IP matches to prevent token reuse
                    if ($verificationData['client_ip'] !== request()->ip()) {
                        $fail('Invalid verification. Please try again.');
                        return;
                    }
                },
            ],
        ];
    }
}