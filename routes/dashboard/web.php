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

            //  Orders Client Routes
            Route::resource('clients.orders', "Client\OrderController")->except([
                'show',
            ])->parameters([
                "clients" => 'id'
            ])->names([
                'index'     => 'clients.orders.index',
                'create'    => 'clients.orders.create',
                'store'     => 'clients.orders.store',
                'edit'      => 'clients.orders.edit',
                'update'    => 'clients.orders.update',
                'destroy'   => 'clients.orders.destroy',
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


            //  Products Routes
            Route::resource('products', "ProductController")->except([
                'show',
            ])->parameters([
                "products" => 'id'
            ])->names([
                'index'     => 'products.index',
                'create'    => 'product.create',
                'store'     => 'product.store',
                'edit'      => 'product.edit',
                'update'    => 'product.update',
                'destroy'   => 'product.destroy',
            ]);
        }); // End of dashboard routes

        // Orders Routes
        Route::resource('orders', "OrderController")->parameters([
            "orders" => 'id'
        ])->names([
            'index'     => 'orders.index',
            'create'    => 'order.create',
            'store'     => 'order.store',
            'show'      => 'order.show',
            'edit'      => 'order.edit',
            'update'    => 'order.update',
            'destroy'   => 'order.destroy',
        ]);

    }
);
