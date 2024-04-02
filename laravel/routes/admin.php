<?php

use App\Http\Controllers\Backend\TagsController;
use App\Http\Controllers\Backend\ItemsController;
use App\Http\Controllers\Backend\ItemsParseController;
use App\Http\Controllers\Backend\AuthControllerAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/items');
    });
    Route::get('/items', [ItemsController::class, 'show']);
    Route::get('/tags', [TagsController::class, 'show'])->name('admin.tags.show');
    Route::put('/tags', [TagsController::class, 'recalculate'])->name('admin.tags.recalculate');

    // Auth routes
    Route::withoutMiddleware(['admin'])->group(function () {
        Route::get('/login', [AuthControllerAdmin::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthControllerAdmin::class, 'login']);
    });

    // Logout route
    Route::match(['get', 'post'], '/logout', [AuthControllerAdmin::class, 'logout'])->name('admin.logout');

    // Items route
    Route::get('/items', [ItemsController::class, 'show']);
    Route::post('/items/add', [ItemsController::class, 'add']);
    Route::put('/items/{itemId}', [ItemsController::class, 'edit']);
    Route::delete('/items/{itemId}', [ItemsController::class, 'remove']);

    // Items parse route
    Route::get('/items-parse', [ItemsParseController::class, 'show']);
    Route::put('/items-parse/{itemId}', [ItemsParseController::class, 'edit']);
    Route::delete('/items-parse/{itemId}', [ItemsParseController::class, 'remove']);


    Route::post('/translate', [ItemsController::class, 'translate']);
});

