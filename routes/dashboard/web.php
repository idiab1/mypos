<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::prefix('dashboard')->middleware(['auth'])->group(function () {

            // Home of dashboard routes
            Route::get('/home', 'DashboardController@index')->name('dashboard.index');

            //  Users Routes
            Route::resource('users', "UserController")->except([
                'show',
            ])->parameters([
                "users" => 'id'
            ])->names([
                'index'     => 'users.index',
                'create'    => 'user.create',
                'store'     => 'user.store',
                'edit'      => 'user.edit',
                'update'    => 'user.update',
                'destroy'   => 'user.destroy',
            ]);

            //  Categories Routes
            Route::resource('categories', "CategoryController")->except([
                'show',
            ])->parameters([
                "categories" => 'id'
            ])->names([
                'index'     => 'categories.index',
                'create'    => 'category.create',
                'store'     => 'category.store',
                'edit'      => 'category.edit',
                'update'    => 'category.update',
                'destroy'   => 'category.destroy',
            ]);

            //  Clients Routes
            Route::resource('clients', "ClientController")->except([
                'show',
            ])->parameters([
                "clients" => 'id'
            ])->names([
                'index'     => 'clients.index',
                'create'    => 'client.create',
                'store'     => 'client.store',
                'edit'      => 'client.edit',
                'update'    => 'client.update',
                'destroy'   => 'client.destroy',
            ]);
        }); // End of dashboard routes


    }
);
