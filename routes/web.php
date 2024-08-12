<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Auth::routes([
    'register' => false
]);

Route::post('temp/store', [TempFileController::class, 'store'])->name('upload');
Route::middleware('auth')->group(function () {});

Route::get('/', [HomeController::class, 'index']);

Route::get('home', [HomeController::class, 'index']);


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'getCartItems'])->name('cart.get');
