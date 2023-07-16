<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductUMKMController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\TransactionUMKMController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UmkmPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/userregister', [AuthController::class, "userregister"])->name('userregister');
Route::get('/ownerregister', [AuthController::class, "ownerregister"])->name('ownerregister');
Route::post('/userregister', [AuthController::class, "douserregister"])->name('do.userregister');
Route::post('/ownerregister', [AuthController::class, "doownerregister"])->name('do.ownerregister');

// UMKM
Route::middleware('auth:pelakuumkm')->group(function () {
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkmindex');
    Route::get('/umkm/add', [UmkmController::class, 'create']);
    Route::post('/umkm', [UmkmController::class, 'store']);
    Route::get('/umkm/detailumkm/{id}', [UmkmController::class, 'detail']);
    Route::get('/umkm/detailumkm/{id}/edit', [UmkmController::class, 'edit']);
    Route::put('/umkm/detailumkm/{id}', [UmkmController::class, 'update']);
    Route::get('umkm/detailumkm/{id}/delete', [UmkmController::class, 'destroy']);

    // PRODUCT UMKM
    Route::get('/umkm/product', [ProductUMKMController::class, 'index']);
    Route::get('/umkm/product/add', [ProductUMKMController::class, 'create']);
    Route::post('/umkm/product', [ProductUMKMController::class, 'store'])->middleware('auth:pelakuumkm');
    Route::get('/umkm/product/detailproduct/{id}', [ProductUMKMController::class, 'detail']);
    Route::get('/umkm/product/{id}/edit', [ProductUMKMController::class, 'edit']);
    Route::put('/umkm/product/{id}', [ProductUMKMController::class, 'update']);
    Route::get('/umkm/product/{id}/delete', [ProductUMKMController::class, 'destroy']);

    // TRANSACTION UMKM
    Route::get('/umkm/transaction', [TransactionUMKMController::class, 'index']);
    Route::post('/transaction/{transaction}/confirm', [TransactionUMKMController::class, 'confirm_payment'])->name('confirm_payment');
});



// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');


// USER
Route::middleware(['auth:web'])->group(function () {
    Route::get('/productpage', [ProductPageController::class, 'index']);
    Route::get('/detailproductpage/{id}', [ProductPageController::class, 'detail']);
    Route::get('/umkmpage', [UmkmPageController::class, 'index']);
    Route::get('/detailumkmpage/{id}', [UmkmPageController::class, 'detail']);
    Route::get('/profilepage', [ProfileUserController::class, 'index']);
    // cart
    Route::post('/cart/{product}', [CartController::class, 'add_toCart'])->name('add_toCart');
    Route::get('/cart', [CartController::class, 'index']);
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    // checkout
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/transaction', [CheckoutController::class, 'show_transaction'])->name('transaction');
    Route::get('/transaction/{transaction}', [CheckoutController::class, 'detail_transaction'])->name('detail_transaction');
    Route::post('/transaction/{transaction}/pay', [CheckoutController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
});
