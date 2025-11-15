<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SlidingPuzzleCaptcha
{
    const PUZZLE_WIDTH = 300;
    const PUZZLE_HEIGHT = 200;
    const PIECE_WIDTH = 50;

    public function generate()
    {
        // Get a random image from public/images directory or create a simple one
        $imagePath = public_path('images/puzzle-bg.jpg');
        
        if (!File::exists($imagePath)) {
            // Create a simple colored background if no image exists
            $image = Image::make(self::PUZZLE_WIDTH, self::PUZZLE_HEIGHT);
            $image->fill(['255', '100', '100']); // Red background
        } else {
            $image = Image::make($imagePath)->resize(self::PUZZLE_WIDTH, self::PUZZLE_HEIGHT);
        }

        // Generate random X position for the puzzle piece
        $pieceX = rand(50, self::PUZZLE_WIDTH - self::PIECE_WIDTH - 50);
        
        // Extract the puzzle piece
        $piece = clone $image;
        $piece->crop(self::PIECE_WIDTH, self::PUZZLE_HEIGHT, $pieceX, 0);
        
        // Darken the puzzle area on the main image
        $image->rectangle($pieceX, 0, $pieceX + self::PIECE_WIDTH, self::PUZZLE_HEIGHT, function ($draw) {
            $draw->background('rgba(0,0,0,0.3)');
        });

        // Save images to temporary location
        $sessionId = session()->getId();
        $mainImagePath = 'images/puzzle/' . $sessionId . '_main.jpg';
        $pieceImagePath = 'images/puzzle/' . $sessionId . '_piece.jpg';
        
        // Ensure directory exists
        File::ensureDirectoryExists(public_path('images/puzzle'));
        
        $image->save(public_path($mainImagePath));
        $piece->save(public_path($pieceImagePath));
        
        // Store puzzle data in session
        session(['puzzle_piece_x' => $pieceX, 'puzzle_session' => $sessionId]);

        return [
            'main_image' => url($mainImagePath),
            'piece_image' => url($pieceImagePath),
            'piece_width' => self::PIECE_WIDTH,
            'puzzle_width' => self::PUZZLE_WIDTH,
        ];
    }

    public function verify($userX)
    {
        $correctX = session('puzzle_piece_x');
        
        if ($correctX === null) {
            return false;
        }
        
        // Allow ±5 pixels tolerance
        $tolerance = 5;
        return abs($correctX - $userX) <= $tolerance;
    }
}
