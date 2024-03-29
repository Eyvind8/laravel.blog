<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CommentController;
use \App\Http\Controllers\Frontend\IndexController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [IndexController::class, 'index']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/id/{id}/{dynamicSlug}', [IndexController::class, 'show'])->where('dynamicSlug', '.*');
Route::post('/increment-like/{itemId}', [IndexController::class, 'incrementLike']);
Route::post('/increment-views', [IndexController::class, 'incrementViews']);
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');



