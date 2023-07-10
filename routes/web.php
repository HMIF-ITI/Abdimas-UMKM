<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('detailumkm/{id}', [UmkmController::class, 'detail'])->middleware('auth:pelakuumkm');
Route::get('detailumkm/{id}/edit', [UmkmController::class, 'edit'])->middleware('auth:pelakuumkm');
Route::put('detailumkm/{id}', [UmkmController::class, 'update'])->middleware('auth:pelakuumkm');
Route::get('detailumkm/{id}/delete', [UmkmController::class, 'destroy'])->middleware('auth:pelakuumkm');
// Route::get('/umkm/addproduct', [UmkmController::class, 'addProduct'])->middleware('auth:pelakuumkm');

// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');
