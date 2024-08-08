<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("home.index");

Route::get('/blog', function () {
    return view('blog.index');
})->name("blog.index");

Route::get('/todoapp', function () {
    return view('todoapp.index');
})->name("todoapp.index");

Route::get('/settings', function () {
    return view('todoapp.settings');
})->name("todoapp.settings");

Route::get('/contact-us', function () {
    return view('contact');
})->name("home.contact");