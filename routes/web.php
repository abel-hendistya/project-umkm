<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
| 
*/

// Halaman awal (guest)
Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('welcome');

// Rute autentikasi bawaan Laravel
Auth::routes();

// Rute setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute setelah login berdasarkan role
Route::middleware('auth')->group(function () {
    Route::get('/redirect', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('users.dashboard');
        }
    })->name('redirect');

    // Rute dashboard admin
    Route::middleware('is_admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Rute dashboard user
    Route::get('/users/dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');
});

// Rute CRUD Produk untuk Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');


// Rute Produk untuk User (Pembelian)
Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});

// Route::resource('products', ProductController::class);


// Rute logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome'); // Arahkan ke halaman awal (welcome)
})->name('logout');
