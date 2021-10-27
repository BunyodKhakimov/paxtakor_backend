<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\ClubStanding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostController::class, 'index'])->name('api.posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('api.posts.show');

Route::get('/register', [AuthController::class, 'register'])->name('custom.register');

Route::get('/verify', [AuthController::class, 'verify'])->name('custom.verify');

Route::get('/club-standings', [ClubStanding::class, 'index'])->name('custom.club_standings.index');
