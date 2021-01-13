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
                'trade_marks' => TradeMarksController::class,
                'departments' => DepartmentsController::class,
                'categories' => CategoriesController::class,
                'sub_categories' => SubCategoriesController::class,
                'products' => ProductsController::class,
                'manufacturers' => ManufacturersController::class,
                'shippings' => ShippingsController::class,
                'malls' => MallsController::class,
                'notifications' => NotificationsController::class,
                'contacts' => ContactsController::class,
                'countries' => CountriesController::class,
                'cities' => CitiesController::class,
                'states' => StatesController::class,
                'colors' => ColorsController::class,
                'weights' => WeightsController::class,
                'sizes' => SizesController::class,
                'settings' => SettingsController::class,
                'roles' => RolesController::class,
                'users' => UsersController::class,
            ]);

            Route::get('trade_marks/destroy/{id}', 'TradeMarksController@destroy');

            Route::get('departments/destroy/{id}', 'DepartmentsController@destroy');

            Route::get('categories/destroy/{id}', 'CategoriesController@destroy');

            Route::get('sub_categories/destroy/{id}', 'SubCategoriesController@destroy');

            Route::get('products/destroy/{id}', 'ProductsController@destroy');

            Route::get('manufacturers/destroy/{id}', 'ManufacturersController@destroy');

            Route::get('shippings/destroy/{id}', 'ShippingsController@destroy');

            Route::get('malls/destroy/{id}', 'MallsController@destroy');

            Route::get('countries/destroy/{id}', 'CountriesController@destroy');
            Route::post('countries/updateStatus/{id}', 'CountriesController@updateStatus');

            Route::get('cities/destroy/{id}', 'CitiesController@destroy');
            Route::post('cities/updateStatus/{id}', 'CitiesController@updateStatus');

            Route::get('states/destroy/{id}', 'StatesController@destroy');
            Route::post('states/updateStatus/{id}', 'StatesController@updateStatus');

            Route::get('colors/destroy/{id}', 'ColorsController@destroy');

            Route::get('weights/destroy/{id}', 'WeightsController@destroy');

            Route::get('sizes/destroy/{id}', 'SizesController@destroy');

            Route::get('settings', 'SettingsController@index')->name('settings.index');
            Route::post('settings', 'SettingsController@update')->name('settings.update');

            Route::get('roles/destroy/{id}', 'RolesController@destroy');

            Route::get('users/destroy/{id}', 'UsersController@destroy');
            Route::delete('users/destroy/all', 'UsersController@multi_delete');
            Route::get('users/multi', 'UsersController@multi')->name('users.multi');
            Route::post('users/updateStatus/{id}', 'UsersController@updateStatus');
        });
    }
);
