<?php

use App\Http\Controllers\Backend\ItemsControllerRootController;
use App\Http\Controllers\Backend\AuthControllerAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', [ItemsControllerRootController::class, 'show']);

    // Auth routes
    Route::withoutMiddleware(['admin'])->group(function () {
        Route::get('/login', [AuthControllerAdmin::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthControllerAdmin::class, 'login']);
    });

    // Logout route
    Route::match(['get', 'post'], '/logout', [AuthControllerAdmin::class, 'logout'])->name('admin.logout');

    // Items route
    Route::get('/items', [ItemsControllerRootController::class, 'show']);
});

