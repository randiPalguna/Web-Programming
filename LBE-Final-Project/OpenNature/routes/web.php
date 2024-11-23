<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\TransactionController;

// Route::get('/', function () {
//     return view('/produk/view');
// });

// Route::get('/produk', function () {
//     return view('/produk/view');
// });


Route::get('/', [PlantController::class, 'view'])->name('produk.view');

Route::get('/product', [PlantController::class, 'view'])->name('produk.view');

Route::get('/user', [UserController::class, 'view'])->name('user.view');

Route::get('/transaction', [TransactionController::class, 'view'])->name('transaksi.view');

Route::post('/transaction', [TransactionController::class, 'store'])->name('transaksi.store');