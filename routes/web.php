<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BlockController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', function () {
    return view('home.index');
})->name('home');

// Route::get('/wallets', function () {
//     return view('wallets.index');
// });
Route::get('/pending', function () {
    return view('pending.index');
});


Route::get('/wallets', [WalletController::class, 'index'])->name('wallets.index');
Route::post('/wallet/create', [WalletController::class, 'create'])->name('wallet.create');
Route::get('/transaction', [TransactionController::class, 'index'])->name('pending.index');
Route::post('/transaction/mine', [TransactionController::class, 'mine'])->name('pending.mine');
// Define the missing route for transaction creation
Route::post('/transaction/create', [TransactionController::class, 'create'])->name('pending.create');


Route::post('/transaction/create', [TransactionController::class, 'create'])->name('pending.create');
Route::get('/transaction/mine', [TransactionController::class, 'index'])->name('home.index');
