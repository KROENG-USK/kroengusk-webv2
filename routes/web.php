<?php

use Illuminate\Support\Facades\Route;

// Include the client routes
require __DIR__.'/client.php';

// Routes that are spesific to web.php
// Add your other web routes here ...

// Example of a web-spesific route
Route::get('/laravel', function () {
    return view('welcome');
});