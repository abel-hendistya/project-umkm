<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UsersController extends Controller
{
    public function dashboard()
    {
        // Ambil semua data produk
        $products = Product::all();

        // Kirim data ke view users.dashboard
        return view('users.dashboard', compact('products'));
    }
}
