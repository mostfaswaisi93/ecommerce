<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');

            Route::resources([
                'roles' => RolesController::class,
                'users' => UsersController::class,
            ]);

            Route::get('roles/destroy/{id}', 'RolesController@destroy');

            Route::get('users/destroy/{id}', 'UsersController@destroy');
            Route::post('users/updateStatus/{id}', 'UsersController@updateStatus');
        });
    }
);
