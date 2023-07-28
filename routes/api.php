<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::get('/health', [HealthController::class, 'get']);

Route::prefix('v1')->group(function () {
    Route::get('/posts', [PostController::class, 'get']);
    Route::post('/posts', [PostController::class, 'post']);
    Route::get('/posts/{id}', [PostController::class, 'getByID']);
    Route::put('/posts/{id}', [PostController::class, 'put']);
    Route::delete('/posts/{id}', [PostController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});