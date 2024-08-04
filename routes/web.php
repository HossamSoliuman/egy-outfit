<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false
]);

Route::post('temp/store', [TempFileController::class, 'store'])->name('upload');
Route::middleware('auth')->group(function () {
});

Route::view('/', 'users/categories');

Route::get('home', [HomeController::class, 'index']);
