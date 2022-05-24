<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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


Route::middleware(['auth','verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

    // Manage Posts
    Route::get('posts/trash', [PostController::class , 'trash'])->name('posts.trash');
    Route::post('posts/trash/{id}/restore', [PostController::class , 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/delete-permanent', [PostController::class,'deletePermanent'])->name('posts.deletePermanent');
    Route::resource('posts', PostController::class);

    // Category
    Route::resource('categories', CategoryController::class);

    // Tag
    Route::resource('tags', TagController::class);

    // Users
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';



