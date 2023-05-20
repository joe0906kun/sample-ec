<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;
use App\Http\Controllers\CartController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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


Route::name('product.')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('index');
    Route::get('/product/{productId}', [ProductController::class, 'show'])->name('show');
});

Route::name('line_item.')->group(function () {
    Route::post('/line_item/create', [LineItemController::class, 'create'])->name('create');
});

Route::name('cart.')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/cart/success', [CartController::class, 'success'])->name('success');
});

Route::get('/login_register', function () {
    return view('layouts.login_register');
})->name('login_register');



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
