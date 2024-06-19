<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
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

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/players', [AdminController::class, 'showPlayers'])->name('admin.players');
    Route::get('/accounts/{player?}', [AdminController::class, 'showAccounts'])->name('admin.accounts');
    Route::get('/settings', [AdminController::class, 'showSettings'])->name('admin.settings');
    Route::get('/transactions', [AdminController::class, 'showTransactions'])->name('admin.transactions');
    Route::get('/bank', [AdminController::class, 'showBank'])->name('admin.bank');
});
Route::middleware(['auth', 'role:player'])->group(function () {
    Route::get('/statement', [PlayerController::class, 'showStatement'])->name('player.statement');
});