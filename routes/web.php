<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\appController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\thankyou;
use Illuminate\Support\Facades\Auth;

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
// routes/web.php






// web.php
Route::resource('cart', CartController::class);

Route::resource('commandes', CommandeController::class);

Route::resource('category', CategoryController::class);

Route::resource('Promotion', PromotionController::class);
// Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('categorie.update');

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/edite/{id}', [ProductController::class, 'edite'])->name('product.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');


Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route::get('/produit/list', [ProduitController::class, 'index'])->name('produit.index');

Route::get('/', [appController::class, 'index'])->name('app.index');
// Auth::routes(); 

// add to cart
Route::post('/products/addToCart', [ProductController::class, 'addToCart'])->name('products.addToCart');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/confirm-cart', [CartController::class, 'confirmCart'])->name('confirm-cart');
Route::post('/commandedutilse', [CartController::class, 'finalisercommandesdutil'])->name('commandedutilse');

Route::get('/commandes.showutili/{id}', [CommandeController::class, 'showutili'])->name('commandes.showutili');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/my account', [UserController::class, 'index'])->name('user.index');
});

Route::middleware('auth','auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/produit/{slug}', [ShopController::class, 'productDetails'])->name('shop.produit.details');
Route::get('/card', [cardController::class, 'index'])->name('card.index');
Route::post('/card/store', [cardController::class, 'addToCart'])->name('card.store');
Route::put('/card/update', [cardController::class, 'updateCart'])->name('card.update');
Route::delete('/card/remove', [cardController::class, 'removeItem'])->name('card.remove');
Route::delete('/card/clear', [cardController::class, 'clearCart'])->name('card.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');


Route::get('/thankyou', [thankyou::class, 'index'])->name('thankyou.index');

Route::resource('produit', ProduitController::class);

require __DIR__.'/auth.php';
