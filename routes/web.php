<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
Route::get('/', [AuthController::class, 'index'])->name('index');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/players', [AdminController::class, 'showPlayers'])->name('admin.players');
Route::get('/accounts', [AdminController::class, 'showAccounts'])->name('admin.accounts');
Route::get('/settings', [AdminController::class, 'showSettings'])->name('admin.settings');
Route::get('/incomings', [AdminController::class, 'showIncomings'])->name('admin.incomings');
Route::get('/outcomings', [AdminController::class, 'showoutcomings'])->name('admin.outcomings');