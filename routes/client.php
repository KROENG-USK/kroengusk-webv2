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
use App\Http\Controllers\Client\ArchievementNews;

// search controller
use App\Http\Controllers\Client\SearchController;

// divisi controller
use App\Http\Controllers\Client\DivisiController;

// document controllers
use App\Http\Controllers\Client\InventoryController;
use App\Http\Controllers\Client\PinjamAlat;
use App\Http\Controllers\Client\PengembalianAlat;
use App\Http\Controllers\Client\RepositoryProject;

// Struktur Pengurus KROENG
use App\Http\Controllers\Client\StrukturPengurusKroeng;

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
Route::get('/profil/prestasi', [ArchievementNews::class, 'index'])->name('client.prestasi.index');

Route::get('/search', [SearchController::class, 'search'])->name('client.search.index');
Route::get('/divisi/{id}/{divisi}', [DivisiController::class, 'show'])->name('client.divisi.show');

Route::get('/profil/struktur-komunitas', [StrukturPengurusKroeng::class, 'index'])->name('client.strukturkomunitas.index');

Route::get('/dokumen/inventory', [InventoryController::class, 'index'])->name('client.inventory.index');
Route::get('/dokumen/inventory/{id}', [InventoryController::class, 'details'])->name('client.view-inventory.index');

Route::get('/dokumen/pinjam-alat', [PinjamAlat::class, 'index'])->name('client.pinjam-alat.index');
Route::post('/dokument/pinjam-alat/post', [PinjamAlat::class, 'post'])->name('client.pinjam-alat.post');

Route::get('/dokumen/pengembalian-alat', [PengembalianAlat::class, 'show'])->name('client.list-data-pengembalianalat');
Route::get('/dokumen/pengembalian-alat/view-data/{pid}', [PengembalianAlat::class, 'details'])->name('client.view-pengembalian-alat');
Route::post('/dokumen/pengembalian-alat/store/{pid}', [PengembalianAlat::class, 'store'])->name('client.store-pengembalian-alat');

Route::get('/dokumen/repository', [RepositoryProject::class, 'index'])->name('client.list-repository.index');
Route::get('/dokumen/add-repository', [RepositoryProject::class, 'add_page'])->name('client.add-repository');
Route::post('/dokumen/store-repository', [RepositoryProject::class, 'store'])->name('client.store-repository');
Route::post('/dokumen/delete-repository', [RepositoryProject::class, 'delete'])->name('client.delete-repository');