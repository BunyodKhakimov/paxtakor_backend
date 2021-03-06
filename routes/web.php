<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

//Route::get('/register', [AuthController::class, 'register'])->name('custom.register');

//Route::get('/verify', [AuthController::class, 'verify'])->name('custom.verify');
