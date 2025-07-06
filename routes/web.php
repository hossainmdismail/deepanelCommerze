<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductFrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about',[HomeController::class, 'about' ])->name('about');
Route::get('/contact',[HomeController::class, 'contact' ])->name('contact');
Route::get('/shop',[HomeController::class, 'shop' ])->name('shop');
Route::get('/product/{slug}',[ProductFrontController::class, 'product'])->name('product.show');
Route::post('/add-to-cart',[ProductFrontController::class, 'cart'])->name('add.to.cart');
Route::get('/cart', [ProductFrontController::class, 'cartShow'])->name('cart.show');
Route::post('/checkout',[OrderController::class, 'checkout'])->name('checkout');
Route::get('/thankyou/{orderId}',[OrderController::class, 'thankyou'])->name('thankyou');
