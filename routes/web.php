<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TodoAppController, BlogController, ContactController};
use App\Http\Controllers\Auth\{RegisterController, LoginController};
use App\Http\Middleware\LogIP;

Route::get('/', function () {
    return view('index');
})->name("home");

Route::get('/welcome', function () {
    return view('welcome');
})->name("welcome");

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
});

Route::get('/contact', [ContactController::class, "index"])->name("contact");
Route::post('/contact', [ContactController::class, "store"]);

Route::get('/register', [RegisterController::class, "showRegistrationForm"])->name("register");
Route::post('/register', [RegisterController::class, "register"]);

Route::get('/login', [LoginController::class, "showLoginForm"])->name("login");
Route::post('/login', [LoginController::class, "login"]);

Route::get('/logout', [LoginController::class, "logout"])->name("logout");