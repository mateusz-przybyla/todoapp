<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TodoAppController, BlogController, ContactController, HomeController};
use App\Http\Middleware\LogIP;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name("welcome")->middleware('guest');

Route::get('/contact', [ContactController::class, "index"])->name("contact");
Route::post('/contact', [ContactController::class, "store"]);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('todoapp')->name('todoapp.')->controller(TodoAppController::class)->group(function(){
    Route::get('/', "index")->name("index");

    Route::get('/create', "create")->name("create");
    Route::post('/create', "store")->name("store");
    
    Route::delete('/delete/{task}', "destroy")->middleware(LogIP::class)->name("destroy");

    Route::put('/update/{task}', "update")->name("update");

    Route::put('/complete/{task}', "complete")->name("complete");
});

Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function(){
    Route::get('/', "index")->name("index");
    Route::post('/', "store")->name("store");

    Route::delete('/delete/{post}', "destroy")->middleware(LogIP::class)->name("destroy");

    Route::get('/update/{post}', "edit")->name("edit");
    Route::put('/update/{post}', "update")->name("update");
});