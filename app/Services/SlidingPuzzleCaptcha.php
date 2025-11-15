<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class SlidingPuzzleCaptcha
{
    private $puzzleSize = 300; // Size in pixels
    private $pieceSize = 50;   // Size of each piece
    private $minDistance = 100; // Minimum distance user must slide

    public function generatePuzzle()
    {
        // Generate a unique token for this puzzle attempt
        $token = Str::random(40);
        
        // Generate random position for the sliding piece (between 3-5 to ensure minimum movement)
        $correctPosition = rand(3, 5);
        
        // Store the correct position and timestamp with the token
        Cache::put("puzzle_position_{$token}", [
            'position' => $correctPosition,
            'timestamp' => now()->timestamp,
            'attempts' => 0
        ], now()->addMinutes(5));
        
        return [
            'token' => $token,
            'puzzleSize' => $this->puzzleSize,
            'pieceSize' => $this->pieceSize,
            'initialPosition' => 0, // Start at left edge
        ];
    }

    public function verifyPuzzle(string $token, int $position): bool
    {
        $puzzleData = Cache::get("puzzle_position_{$token}");
        
        if (!$puzzleData || !is_array($puzzleData)) {
            return false; // Token expired or invalid
        }

        // Increment attempt counter
        $puzzleData['attempts']++;
        if ($puzzleData['attempts'] > 3) {
            Cache::forget("puzzle_position_{$token}");
            return false; // Too many attempts
        }
        
        // Update attempts in cache
        Cache::put("puzzle_position_{$token}", $puzzleData, now()->addMinutes(5));

        // Ensure minimum time spent (at least 1 second)
        $timeTaken = now()->timestamp - $puzzleData['timestamp'];
        if ($timeTaken < 1) {
            return false; // Too fast, likely automated
        }

        // Ensure minimum distance moved
        if ($position < $this->minDistance) {
            return false; // Didn't slide far enough
        }

        // Calculate target position
        $targetPosition = $puzzleData['position'] * $this->pieceSize;
        
        // Check if position matches with small tolerance for alignment
        $isCorrect = abs($position - $targetPosition) <= 5;
        
        if ($isCorrect) {
            // Clean up puzzle data
            Cache::forget("puzzle_position_{$token}");
            
            // Store verification success for 5 minutes with additional data
            Cache::put("puzzle_verified_{$token}", [
                'verified_at' => now()->timestamp,
                'client_ip' => request()->ip()
            ], now()->addMinutes(5));
        }
        
        return $isCorrect;
    }
}