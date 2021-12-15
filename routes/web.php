<?php

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

Route::get('/', [\App\Http\Controllers\ArticleController::class , 'index'])->name('article.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('article/create',[\App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
Route::post('article/store',[\App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
Route::get('article/show/{article}',[\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('article/edit/{article}',[\App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit');
Route::put('article/update/{article}',[\App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');
Route::delete('article/delete/{article}',[\App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.delete');
