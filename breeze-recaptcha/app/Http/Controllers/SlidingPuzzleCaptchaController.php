<?php

namespace App\Http\Controllers;

use App\Services\SlidingPuzzleCaptcha;
use Illuminate\Http\Request;

class SlidingPuzzleCaptchaController extends Controller
{
    public function generate(SlidingPuzzleCaptcha $captcha)
    {
        $data = $captcha->generate();
        return response()->json($data);
    }

    public function verify(Request $request, SlidingPuzzleCaptcha $captcha)
    {
        $userX = $request->input('x');
        
        if ($captcha->verify($userX)) {
            session(['captcha_verified' => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
