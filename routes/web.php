<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::get('/create', [GuestController::class, 'create'])->name('guest.create');
Route::post('/create', [GuestController::class, 'store'])->name('guest.post');
Route::get('/edit/{id}', [GuestController::class, 'edit'])->name('guest.edit');
Route::put('/edit/{id}', [GuestController::class, 'update'])->name('guest.update');
Route::delete('/delete/{id}', [GuestController::class, 'destroy'])->name('guest.delete');

