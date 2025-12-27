<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\OfferController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\CacheController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/best-sellers', [ProductController::class, 'index'])->name('best');

Route::get('/offers', [OfferController::class, 'index'])->name('offers');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{item}/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{item}/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/track', [OrderController::class, 'track'])->name('orders.track');

    Route::get('/tracking', fn() => response('Order tracking page'))->name('tracking');
    Route::get('/addresses', fn() => response('Addresses page'))->name('addresses');
    Route::get('/wallet', fn() => response('Wallet page'))->name('wallet');

    Route::post('/cache/clear', [CacheController::class, 'clear'])->name('cache.clear');
});
