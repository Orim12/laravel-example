<?php

use Illuminate\Support\Facades\Route;

# web routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});



# api calls
Route::get('/foo', function () {
    return ['foo' => 'bar'];
});