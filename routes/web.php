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
    // sidebar links
    Route::view('/dashboard/insight', 'dashboard.insight')->name('insight');
    Route::view('/dashboard/profile', 'dashboard.profile')->name('profile');
    Route::view('/dashboard/chat', 'dashboard.chat')->name('chat');
    
    // Route::get(/) and CRUD articles
    Route::get('/publish-articale', [PublishBlogController::class, 'index'])->name('publish-blog.create');
    Route::post('/publish-articale', [PublishBlogController::class, 'store'])->name('publish-blog.store');
    Route::get('/publish-articale/edit/{post}', [PublishBlogController::class, 'edit'])->name('publish-blog.edit');
    Route::put('/publish-articale/edit/{post}', [PublishBlogController::class, 'update'])->name('publish-blog.update');
    
    // dashboard controller to show post for writer 
    Route::get('/dashboard/article', [DashboardController::class, 'index'])->name('article');
});