<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([ ],function (){
    Route::get('articles' , [\App\Http\Controllers\API\ArticleController::class , 'index']);
    Route::post('article/store' , [\App\Http\Controllers\API\ArticleController::class , 'store']);
    Route::get('article/show/{article}' , [\App\Http\Controllers\API\ArticleController::class , 'show']);
    Route::put('article/update/{article}' , [\App\Http\Controllers\API\ArticleController::class , 'update']);
    Route::delete('article/delete/{article}' , [\App\Http\Controllers\API\ArticleController::class , 'destroy']);
});
