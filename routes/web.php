<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Post\PostController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::prefix('categories')->group(function () {
    Route::get('/{category}', [MainController::class, 'categoryShow'])->name('main.categories.show');
    Route::get('/', [MainController::class, 'categories'])->name('main.categories.index');
});

Auth::routes(['verify' => true, 'register' => config('registration.is_registration_available')]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware([AdminMiddleware::class, 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('users', UsersController::class);
});

Route::prefix('personal')->middleware('verified')->group(function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('/liked', [PersonalController::class, 'liked'])->name('personal.liked');
    Route::delete('/liked/{post}', [PersonalController::class, 'likedDelete'])->name('personal.liked.delete');
    Route::delete('/comment/{comment}', [PersonalController::class, 'commentDelete'])->name('personal.comment.delete');
    Route::get('/comment/{comment}', [PersonalController::class, 'commentEdit'])->name('personal.comment.edit');
    Route::patch('/comment/{comment}', [PersonalController::class, 'commentUpdate'])->name('personal.comment.update');
    Route::get('/comment', [PersonalController::class, 'comment'])->name('personal.comment.index');
});

Route::prefix('posts')->group(function () {
    Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
    Route::prefix('{post}/comments')->group(function () {
        Route::post('/', [PostController::class, 'commentStore'])->name('post.comment.store');
    });
    Route::prefix('{post}/like')->group(function () {
        Route::post('/', [PostController::class, 'likeStore'])->name('post.like.store');
    });
});
