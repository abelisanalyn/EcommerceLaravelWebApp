<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Display the shop page with paginated products.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('shop.index', compact('products'));
    }

    /**
     * Display a single product detail page.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('shop.show', compact('product'));
    }
}
