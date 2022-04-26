<?php

use App\Http\Controllers\BookCreateController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginIndexController;
use App\Http\Controllers\RegisterIndexController;
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

Route::get('/', HomeController::class);

Route::get('/auth/login', LoginIndexController::class)->name('login');
Route::get('/auth/register', RegisterIndexController::class)->name('register');

Route::fallback(fn () => view('auth.register'));


// book store
Route::post('/books', BookStoreController::class)->name('books.store');
Route::get('/books', BookCreateController::class)->name('books.create');
