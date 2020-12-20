<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');

            // Route::resources([
            //     'users' => UserController::class,
            // ]);

            // Route::get('users/destroy/{id}', 'UserController@destroy');
            // Route::post('users/updateStatus/{id}', 'UserController@updateStatus');
        });
    }
);
