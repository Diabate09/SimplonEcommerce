<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetaisController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\ProfileController;
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

Route::get('/',[ProductController::class,'index'])->name('home');

Route::get('/service',[ServiceController::class,'serviceService'])->name('service.show');

Route::match(['get', 'post', 'patch'], '/update-cart/{id}', [ProductController::class, 'updateCart'])->name('elements.update_cart');




Route::get('/products_create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/addcart', [ProductController::class, 'Showcart'])->name('elements.cart_show_show');
Route::get('/addcart/{id?}', [ProductController::class, 'cartShow'])->name('elements.cart_show');

Route::get('/shop', [ShopController::class, 'ShopProduit'])->name('shopshow');

Route::get('/removecart/{id}', [ProductController::class, 'removeFromCart'])->name('elements.remove_cart');



Route::get('/thankyou/{commande_id}', [ProductController::class, 'showThankyou'])->name('thankyou.show');

// Dans web.php
Route::get('/checkout/{id}/{quantity}', [ProductController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [ProductController::class, 'passerCommande'])->name('commande');
Route::get('/search', [ProductController::class, 'search'])->name('search');



Route::get('/about', [ProductController::class, 'showabout'])->name('elements.about_show');

Route::get('/details', [DetaisController::class, 'detailsShow'])->name('elements.detailsShow');
Route::get('/details/{id}', [DetaisController::class, 'showProductDetails'])->name('elements.showDetails_show');

Route::get('/contacts', [ContactController::class, 'showContactPage'])->name('contacts.nosContact');
Route::post('/contacts', [ContactController::class, 'requireContact'])->name('requireNousContact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
