<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show checkout page
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('checkout.index');
    }

    /**
     * Place the order
     */
    public function place(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20',
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $subtotal = 0;
        $cartItems = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $itemTotal = $product->price * $quantity;
                $subtotal += $itemTotal;
                $cartItems[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $itemTotal,
                ];
            }
        }

        $tax = $subtotal * 0.08;
        $total = $subtotal + $tax;

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_phone' => $request->shipping_phone,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cartItems as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'product_name' => $item['product']->name,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
                'subtotal' => $item['subtotal'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('checkout.confirmation', $order->id)->with('success', 'Order placed successfully!');
    }

    /**
     * Show order confirmation
     */
    public function confirmation($orderId)
    {
        $order = Order::with('items')->findOrFail($orderId);
        
        // Ensure the user is authorized to view this order
        if ($order->user_id != auth()->id() && !auth()->user()->is_admin) {
            abort(403);
        }

        return view('checkout.confirmation', compact('order'));
    }
}
