<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VcfCardController;
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

Route::get('/', function () {
    return view('demo');
});
Route::get('/profile/1234', function () {
    return view('profile');
});
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');

Route::get('/terms-and-condition', [PageController::class, 'terms'])->name('terms');
Route::get('/cancellation-refund-policy', [PageController::class, 'cancellation'])->name('cancellation');
Route::get('/shipping-and-delivery', [PageController::class, 'shipping'])->name('shipping');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');

Route::get('/vcf/{profile_code}', [VcfCardController::class, 'show']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/p/d/{product_slug}', [ShopController::class, 'productDetails'])->name('shop.details');
Route::get('/p/c/{product_slug}', [ShopController::class, 'customiseCard'])->name('shop.product.custom');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::post('/checkout', [ShopController::class, 'checkoutSave'])->name('shop.checkoutSave');
Route::post('/generate-order', [ShopController::class, 'generateOrder'])->name('generateOrder');
Route::get('/thankyou/{order_id}', [ShopController::class, 'thankyou'])->name('thankyou');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashobard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/card-design/{type}', [CardController::class, 'index'])->name('card.design');
});

require __DIR__.'/auth.php';
