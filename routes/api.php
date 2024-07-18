<?php

use App\Http\Controllers\Api\UserControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/register', [UserControllerApi::class, 'createUser']);
Route::post('/auth/login', [UserControllerApi::class, 'loginUser']);


Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/posts', [\App\Http\Controllers\PostsController::class, 'store']);

Route::get('/users/{id}/posts', [\App\Http\Controllers\PostsController::class, 'mengembalikan']);


Route::get('/posts', [\App\Http\Controllers\PostsController::class, 'mengembalikansemua']);

Route::delete('/users/{id}', [\App\Http\Controllers\PostsController::class, 'hapus']);
