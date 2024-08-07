<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/todoapp', function () {
    return view('todoapp');
});

Route::get('/contact', function () {
    return view('contact');
});