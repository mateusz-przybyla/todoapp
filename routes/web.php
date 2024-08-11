<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TodoAppController, BlogController, ContactController};

Route::get('/', function () {
    return view('index');
})->name("home.index");

Route::get('/todoapp', [TodoAppController::class, 'index'])->name("todoapp.index");
Route::post('/todoapp', [TodoAppController::class, 'store'])->name("todoapp.store");

Route::get('/blog', [BlogController::class, 'index'])->name("blog.index");

Route::get('/contact', [ContactController::class, 'index'])->name("contact");