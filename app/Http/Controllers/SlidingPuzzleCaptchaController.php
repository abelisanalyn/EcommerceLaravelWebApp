<?php

namespace App\Http\Controllers;

use App\Services\SlidingPuzzleCaptcha;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class SlidingPuzzleCaptchaController extends Controller
{
    private $puzzleService;
    
    public function __construct(SlidingPuzzleCaptcha $puzzleService)
    {
        $this->puzzleService = $puzzleService;
    }

    public function generate(Request $request): JsonResponse
    {
        // Rate limiting: 30 puzzles per minute per IP
        $rateLimiter = RateLimiter::attempt(
            'puzzle_generate:' . $request->ip(),
            30,
            function() {},
            60
        );

        if (!$rateLimiter) {
            return response()->json([
                'error' => 'Too many attempts. Please wait a minute and try again.'
            ], 429);
        }

        $puzzle = $this->puzzleService->generatePuzzle();
        
        // Store token data with IP
        Cache::put(
            "puzzle_token_{$puzzle['token']}", 
            [
                'ip' => $request->ip(),
                'created_at' => now()
            ],
            now()->addMinutes(5)
        );

        return response()->json($puzzle);
    }

    public function verify(Request $request): JsonResponse
    {
        try {
            // Rate limiting: 10 attempts per minute per IP
            $rateLimiter = RateLimiter::attempt(
                'puzzle_verify:' . $request->ip(),
                10, // max attempts
                function() {}, // no action needed
                60 // decay time in seconds
            );

            if (!$rateLimiter) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Too many attempts. Please wait a minute and try again.'
                ], 429);
            }

            $validated = $request->validate([
                'token' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/'],
                'position' => ['required', 'numeric', 'min:0', 'max:300'],
            ]);

            // Check if token is already verified to prevent reuse
            if (Cache::has("puzzle_verified_{$validated['token']}")) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Token already used. Please generate a new puzzle.'
                ], 400);
            }

            // Get token details from cache
            $tokenData = Cache::get("puzzle_token_{$validated['token']}");
            
            if (!$tokenData) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Invalid or expired token. Please generate a new puzzle.'
                ], 400);
            }

            // Verify IP to prevent token sharing
            if ($tokenData['ip'] !== $request->ip()) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Invalid token for this session. Please generate a new puzzle.'
                ], 400);
            }

            $isValid = $this->puzzleService->verifyPuzzle(
                $validated['token'],
                (int)$validated['position']
            );

            if ($isValid) {
                // Mark token as verified to prevent reuse
                Cache::put("puzzle_verified_{$validated['token']}", true, now()->addMinutes(30));
                // Remove token data
                Cache::forget("puzzle_token_{$validated['token']}");
            }

            return response()->json([
                'valid' => $isValid,
                'message' => $isValid ? 'Verification successful' : 'Incorrect position. Please try again.'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid input. Please try again.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'valid' => false,
                'message' => 'Verification failed. Please try again.'
            ], 400);
        }
    }
}