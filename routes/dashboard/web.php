<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {

    // Home of dashboard routes
    Route::get('/home', 'DashboardController@index')->name('dashboard.index');

    //  Users Routes
    Route::resource('users', "UserController")->except([
        'show',
    ])->names([
        'index'     => 'users.index',
        'create'    => 'user.create',
        'store'     => 'user.store',
        'edit'      => 'user.edit',
        'update'    => 'user.update',
        'destroy'   => 'user.destroy',
    ]);
}); // End of dashboard routes
