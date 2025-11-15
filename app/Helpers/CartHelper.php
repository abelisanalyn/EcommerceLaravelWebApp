<?php

namespace App\Helpers;

class CartHelper
{
    public static function getCount()
    {
        $cart = session()->get('cart', []);
        return array_sum($cart); // Sum all quantities
    }

    public static function getItems()
    {
        return session()->get('cart', []);
    }

    public static function getTotal()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $productId => $quantity) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $total += $product->price * $quantity;
            }
        }
        
        return $total;
    }
}
