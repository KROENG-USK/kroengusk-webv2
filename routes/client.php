<?php

use Illuminate\Support\Facades\Route;

// Not Found 
use App\Http\Controllers\Client\NotFound;

// home controller
use App\Http\Controllers\Client\HomeController;

// contact-us controller
use App\Http\Controllers\Client\ContactUsController;

// news controllers
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\CategoryController;

// search controller
use App\Http\Controllers\Client\SearchController;

// divisi controller
use App\Http\Controllers\Client\DivisiController;

// Route::get('/', function () {
//     return view('welcome');
// });

// 404 Page | Not Found
Route::get('/404page', [NotFound::class, 'index'])->name('includes.error.404page');
Route::fallback([NotFound::class, 'index'])->name('includes.error.404page');

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('client.home.index');
Route::get('/home', [HomeController::class, 'index'])->name('client.home.index');
// Contact-us Page
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('client.contact-us.index');
Route::post('/contact-us/send', [ContactUsController::class, 'send'])->name('client.contact-us.send');
// News Page
Route::get('/news', [NewsController::class, 'index'])->name('client.news.index');
Route::get('/news/{nid}/{page}', [NewsController::class, 'show'])->name('client.news.show');
Route::post('/comments/store', [CommentController::class, 'store'])->name('client.comments.store');
Route::get('/category/{catid}', [CategoryController::class, 'index'])->name('client.category.index');

Route::get('/search', [SearchController::class, 'search'])->name('client.search.index');
Route::get('/divisi/{id}/{divisi}', [DivisiController::class, 'show'])->name('client.divisi.show');
