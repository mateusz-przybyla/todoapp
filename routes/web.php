<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TodoAppController, BlogController, ContactController};
use App\Http\Middleware\LogIP;

Route::get('/', function () {
    return view('index');
})->name("home.index");

Route::prefix('todoapp')->name('todoapp.')->controller(TodoAppController::class)->group(function(){
    Route::get('/', "index")->name("index");
    Route::post('/', "store")->name("store");
    Route::delete('/{task}', "destroy")->middleware(LogIP::class)->name("destroy");
    Route::put('/update/{task}', "update")->name("update");
    Route::put('/complete/{task}', "complete")->name("complete");
});

Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function(){
    Route::get('/', "index")->name("index");
    Route::post('/', "store")->name("store");
    Route::delete('/{post}', "destroy")->middleware(LogIP::class)->name("destroy");
    Route::put('/update/{post}', "update")->name("update");
});

Route::get('/contact', [ContactController::class, 'index'])->name("contact");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
