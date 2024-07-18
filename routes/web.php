<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth;

// admin
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\ProfileControllerAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;



//users
use App\Http\Controllers\DashboardUsers;
use App\Http\Controllers\ProfileControllerUsers;
use App\Http\Controllers\PostsControllerUsers;
use App\Http\Controllers\UserControllerUsers;


use App\Http\Controllers\UserPostController;


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
//     return view('welcome');
// });


Route::get('/', [Auth::class, 'index'])->name('login');


Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);


Route::post('/auth/updatelupapassword', [Auth::class, 'updatelupapassword']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdmin::class, 'index']);

    Route::get('/admin/profile', [ProfileControllerAdmin::class, 'index']);
    Route::post('/admin/profile/{id}', [ProfileControllerAdmin::class, 'editprofile']);

    // users
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::post('/admin/user/storeweb', [UserController::class, 'storeweb']);
    Route::get('/admin/user/tambah', [UserController::class, 'tambah']);
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/admin/user/update', [UserController::class, 'update']);
    Route::get('/admin/user/hapus/{id}', [UserController::class, 'hapus']);
    Route::get('/admin/user/detail/{id}', [UserController::class, 'detail']);


    // posts
    Route::get('/admin/posts', [PostsController::class, 'index']);
    Route::post('/admin/posts/storeweb', [PostsController::class, 'storeweb']);
    Route::get('/admin/posts/tambah', [PostsController::class, 'tambah']);
    Route::get('/admin/posts/edit/{id}', [PostsController::class, 'edit']);
    Route::post('/admin/posts/update', [PostsController::class, 'update']);
    Route::get('/admin/posts/hapusdata/{id}', [PostsController::class, 'hapusdata']);
    Route::get('/admin/posts/detail/{id}', [PostsController::class, 'detail']);


    Route::get('/admin/users/{id}/posts', [UserPostController::class, 'getUserPosts']);
});



Route::middleware(['auth', 'users'])->group(function () {
    Route::get('/users/dashboard', [DashboardUsers::class, 'index']);

    Route::get('/users/profile', [ProfileControllerUsers::class, 'index']);
    Route::post('/users/profile/{id}', [ProfileControllerUsers::class, 'editprofile']);

    // users
    // Route::get('/users/user', [UserControllerUsers::class, 'index']);
    // Route::post('/users/user/storeweb', [UserControllerUsers::class, 'storeweb']);
    // Route::get('/users/user/tambah', [UserControllerUsers::class, 'tambah']);
    // Route::get('/users/user/edit/{id}', [UserControllerUsers::class, 'edit']);
    // Route::post('/users/user/update', [UserControllerUsers::class, 'update']);
    // Route::get('/users/user/hapus/{id}', [UserControllerUsers::class, 'hapus']);
    // Route::get('/users/user/detail/{id}', [UserControllerUsers::class, 'detail']);


    // posts
    Route::get('/users/posts', [PostsControllerUsers::class, 'index']);
    Route::post('/users/posts/storeweb', [PostsControllerUsers::class, 'storeweb']);
    Route::get('/users/posts/tambah', [PostsControllerUsers::class, 'tambah']);
    Route::get('/users/posts/edit/{id}', [PostsControllerUsers::class, 'edit']);
    Route::post('/users/posts/update', [PostsControllerUsers::class, 'update']);
    Route::get('/users/posts/hapusdata/{id}', [PostsControllerUsers::class, 'hapusdata']);
    Route::get('/users/posts/detail/{id}', [PostsControllerUsers::class, 'detail']);


    Route::get('/admin/users/{id}/posts', [UserPostController::class, 'getUserPosts']);
});
