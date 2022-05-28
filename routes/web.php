<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use Spatie\Sitemap\SitemapGenerator;

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

Route::get('/', [FrontController::class, 'index'])->name('frontpage');
Route::get('blog/{slug}', [FrontController::class, 'show'])->name('blog.show');
Route::get('category/{category:slug}', [FrontController::class, 'category'])->name('category');

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

    // Users
    Route::resource('users', UserController::class);
    Route::patch('users/{id}/update-password', [UserController::class,'updatePass'])->name('users.updatepass');

    // Storage Link
    Route::get('/storage-link', function () {Artisan::call('storage:link');});

    // Generate Sitemap
    Route::get('/generate-sitemap', function () {
        $sitemap = Sitemap::create();
        $post = Post::all();

        foreach ($post as $post) {
            $sitemap->add(Url::create("/post/{$post->slug}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    });
});

require __DIR__.'/auth.php';






