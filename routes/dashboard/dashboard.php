<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    // Home of dashboard routes
    Route::get('/home', 'DashboardController@index')->name('dashboard');
}); // End of dashboard routes
