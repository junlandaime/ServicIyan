<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\Ecommerce\FrontController;

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



Auth::routes();

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/product', [FrontController::class, 'product'])->name('front.product');
Route::get('/product/{slug}', [FrontController::class, 'show'])->name('front.show_product');
Route::get('/blog', [FrontController::class, 'blog']);
Route::get('/contact', [FrontController::class, 'kontak'])->name('front.contact');
Route::get('/category/{slug}', [FrontController::class, 'categoryProduct'])->name('front.category');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    //INI ADALAH ROUTE BARU
    Route::resource('category', CategoryController::class)->except(['create', 'show']);
    Route::resource('product', ProductController::class)->except(['show']);
    Route::get('/product/bulk', [ProductController::class, 'massUploadForm'])->name('product.bulk');
    Route::post('/product/bulk', [ProductController::class, 'massUpload'])->name('product.saveBulk');

    Route::resource('kategory', KategoryController::class)->except(['create', 'show']);
    Route::resource('post', PostController::class)->except(['show']);
});

Route::get('/posts', [PostController::class, 'front'])->name('front.blog');
// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [PostController::class, 'categories']);
// Route::get('/categories/{category:slug}', [PostController::class, 'category']);
Route::get('authors/{author:username}', [PostController::class, 'author']);