<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data produk dan transaksi dari database
        $products = Product::all();
        $transactions = Transaction::all();

        // Kirim data ke view
        return view('admin.dashboard', compact('products', 'transactions'));
    }
}
