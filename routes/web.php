<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Personal\PersonalController;
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

Route::get('/', [MainController::class, 'index']);

Auth::routes(['verify' => true]);

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
    Route::delete('/liked/{post}', [PersonalController::class, 'deleteLiked'])->name('personal.liked.delete');
    Route::delete('/comment/{comment}', [PersonalController::class, 'commentDelete'])->name('personal.comment.delete');
    Route::get('/comment/{comment}', [PersonalController::class, 'commentEdit'])->name('personal.comment.edit');
    Route::patch('/comment/{comment}', [PersonalController::class, 'commentUpdate'])->name('personal.comment.update');
    Route::get('/comment', [PersonalController::class, 'comment'])->name('personal.comment.index');
});
