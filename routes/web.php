<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductUMKMController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;

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
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkmindex')->middleware('auth:pelakuumkm');
Route::get('/umkm/add', [UmkmController::class, 'create'])->middleware('auth:pelakuumkm');
Route::post('/umkm', [UmkmController::class, 'store'])->middleware('auth:pelakuumkm');
Route::get('/umkm/detailumkm/{id}', [UmkmController::class, 'detail'])->middleware('auth:pelakuumkm');
Route::get('/umkm/detailumkm/{id}/edit', [UmkmController::class, 'edit'])->middleware('auth:pelakuumkm');
Route::put('/umkm/detailumkm/{id}', [UmkmController::class, 'update'])->middleware('auth:pelakuumkm');
Route::get('umkm/detailumkm/{id}/delete', [UmkmController::class, 'destroy'])->middleware('auth:pelakuumkm');

// PRODUCT UMKM
Route::get('/umkm/product', [ProductUMKMController::class, 'index'])->middleware('auth:pelakuumkm');
Route::get('/umkm/product/add', [ProductUMKMController::class, 'create'])->middleware('auth:pelakuumkm');
Route::post('/umkm/product', [ProductUMKMController::class, 'store'])->middleware('auth:pelakuumkm');
Route::get('/umkm/product/detailproduct/{id}', [ProductUMKMController::class, 'detail'])->middleware('auth:pelakuumkm');
Route::get('/umkm/product/{id}/edit', [ProductUMKMController::class, 'edit'])->middleware('auth:pelakuumkm');
Route::put('/umkm/product/{id}', [ProductUMKMController::class, 'update'])->middleware('auth:pelakuumkm');
Route::get('umkm/product/{id}/delete', [ProductUMKMController::class, 'destroy'])->middleware('auth:pelakuumkm');

// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');



// USER
// Route::get('/productpage', [ProductUMKMController::class, 'userProduct']);
Route::get('/productpage', [ProductController::class, 'index']);
Route::get('/detailproductpage', [ProductController::class, 'detailProduct']);
