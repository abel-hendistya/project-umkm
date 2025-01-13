<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/WishlistController.php
class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        $wishlistItem = Wishlist::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist');
    }

    public function index()
    {
        $user = auth()->user();
        $wishlistItems = $user->wishlist()->with('product')->get();

        return view('wishlist.index', compact('wishlistItems'));
    }
}