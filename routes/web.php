<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/userregister', [AuthController::class, "userregister"])->name('userregister');
Route::get('/ownerregister', [AuthController::class, "ownerregister"])->name('ownerregister');
Route::post('/userregister', [AuthController::class, "douserregister"])->name('do.userregister');
Route::post('/ownerregister', [AuthController::class, "doownerregister"])->name('do.ownerregister');
Route::get('/productpage', [ProductController::class, 'index']);

// UMKM
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkmindex');

// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');
