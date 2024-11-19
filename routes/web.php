<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublishBlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/', [SingleActionController::class, 'index'])->name('home');



Route::middleware('guest')->group(function () {
    // sign-up
    Route::view('/authorisation/sign-up', 'auth.sign-up')->name('sign-up');
    Route::post('/authorisation/sign-up', [AuthController::class, 'register']);
    // login
    Route::view('/authorisation/login', 'auth.login')->name('login');
    Route::post('/authorisation/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::view('medium/users/dashboard/insight', 'dashboard.insight')->name('insight');
    Route::view('medium/users/dashboard/profile', 'dashboard.profile')->name('profile');
    // Route::view('medium/users/dashboard/article', 'dashboard.article')->name('article');
    Route::view('medium/users/dashboard/chat', 'dashboard.chat')->name('chat');
    
    // Route::get(/)
    Route::get('/publish-articale', [PublishBlogController::class, 'index'])->name('publish-blog.create');
    Route::post('/publish-articale', [PublishBlogController::class, 'store'])->name('publish-blog.store');
    
    // dashboard controller to show post for writer 
    Route::get('/medium/users/dashboard/article', [DashboardController::class, 'index'])->name('article');
});