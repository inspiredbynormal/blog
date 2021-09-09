<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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



Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/blog-details/{post:post_slug}', [FrontController::class, 'blog_details'])->name('front.blog-details');
Route::get('/category-all', [FrontController::class, 'category_all'])->name('front.category-all');
Route::get('/posts-by-category/{category:category_slug}', [FrontController::class, 'posts_by_category'])->name('front.posts-by-category');
Route::get('/posts', [FrontController::class, 'post_all'])->name('front.posts-all');
Route::get('/search-posts', [FrontController::class, 'search_posts'])->name('front.search-posts');


Route::get('/test', [FrontController::class, 'test']);

Route::get('testing', [FrontController::class, 'testing']);


Route::group(['middleware' => 'login_check'], function () {
    Route::get('user-login', [UserController::class, 'login'])->name('user-login');
    Route::post('user-login-submit', [UserController::class, 'login_submit'])->name('user-login-submit');

    Route::get('user-register', [UserController::class, 'register'])->name('user-register');
    Route::post('user-register-submit', [UserController::class, 'register_submit'])->name('user-register-submit');

    Route::get('admin-login', [UserController::class, 'admin_login'])->name('admin-login');
    Route::post('admin-login-submit', [UserController::class, 'admin_login_submit'])->name('admin-login-submit');
});

Route::post('comment-submit', [FrontController::class, 'comment_submit'])->name('user.comment.submit');

Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'user_auth'], function () {

    Route::group(['middleware' => 'admin_auth'], function () {
        Route::resource('/user', UserController::class);
        Route::resource('/category', CategoryController::class);
    });
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/{comment:id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{comment:id}/update', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{comment:id}/destroy', [CommentController::class, 'delete'])->name('comment.destroy');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/post', PostController::class);
});
