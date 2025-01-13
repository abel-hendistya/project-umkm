<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/CheckoutController.php
class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = auth()->user();
        $cartItems = session()->get('cart', []);

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total' => collect($cartItems)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            }),
        ]);

        foreach ($cartItems as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully!');
    }
}