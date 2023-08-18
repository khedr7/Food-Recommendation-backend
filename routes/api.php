<?php

use App\Http\Controllers\UserController;
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


Route::post('/register', [UserController::class, 'register']);
Route::post('/login',    [UserController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/show',    [UserController::class, 'show']);
    Route::post('/update', [UserController::class, 'update']);
    
    Route::get('/get-favorite',        [UserController::class, 'getFavoriteRecipe']);
    Route::post('/add-to-favorite',    [UserController::class, 'addToFavorite']);
    Route::post('/remove-to-favorite', [UserController::class, 'removeToFavorite']);
});
