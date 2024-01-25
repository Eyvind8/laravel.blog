<?php

use App\Http\Controllers\Backend\ItemsController;
use App\Http\Controllers\Backend\AdminAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', [ItemsController::class, 'show']);

    // Auth routes
    Route::withoutMiddleware(['admin'])->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Logout route
    Route::match(['get', 'post'], '/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Items route
    Route::get('/items', [ItemsController::class, 'show']);
});

