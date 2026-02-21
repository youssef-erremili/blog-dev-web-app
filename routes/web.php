<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishBlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/explore', [HomeController::class, 'explore'])->name('explore');

Route::get('/web-development', function () {
    return view('index');
})->name('web-development');

Route::get('/author/{id}/@{author}', [ProfileController::class, 'author'])->name('author');
Route::get('/reader/{id}/{writer}/{title}', [PublishBlogController::class, 'show'])->name('reader');



Route::middleware('guest')->prefix('authorisation')->group(function () {
    // sign-up
    Route::view('/sign-up', 'auth.sign-up')->name('sign-up');
    Route::post('/sign-up', [AuthController::class, 'register']);
    // login
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // sidebar links
    Route::get('/dashboard/{author}/overview', [DashboardController::class, 'overview'])->name('overview');
    Route::get('/dashboard/{author}/article', [DashboardController::class, 'article'])->name('article');
    Route::view('/dashboard/{author}/profile', 'dashboard.profile')->name('profile');
    Route::view('/dashboard/{author}/chat', 'dashboard.chat')->name('chat');

    // Route::get(/) and CRUD articles
    Route::get('/publish-articale', [PublishBlogController::class, 'index'])->name('publish-blog.create');
    Route::post('/publish-articale', [PublishBlogController::class, 'store'])->name('publish-blog.store');
    Route::get('/publish-articale/edit/{post}', [PublishBlogController::class, 'edit'])->name('publish-blog.edit');
    Route::put('/publish-articale/edit/{post}', [PublishBlogController::class, 'update'])->name('publish-blog.update');
    Route::delete('/publish-articale/delete/{post}', [PublishBlogController::class, 'destroy'])->name('publish-blog.delete');
});



// Route for profile edit
Route::middleware('auth')->group(function () {
    // crud profile cover
    Route::put('/dashboard/profile/handle-profile/{id}', [ProfileController::class, 'handleProfilePicture'])->name('handle-profile');
    // save info's author
    Route::put('/dashboard/profile/save-info/{id}', [ProfileController::class, 'saveInfo'])->name('save-info');
    // update user password
    Route::put('/dashboard/profile/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('update-password');
    // adding user social links
    Route::put('/dashboard/profile/save-links/{id}', [ProfileController::class, 'addSocialLinks'])->name('save-links');
    // change visibility of user account
    Route::put('/dashboard/profile/change-visibility/{id}', [ProfileController::class, 'changeVisibility'])->name('change-visibility');
    // delete account permanently
    Route::delete('/dashboard/profile/delete-account/{id}', [ProfileController::class, 'destroyAccount'])->name('destroy-account');
});



// route for saving articles
Route::middleware('auth')->group(function () {
    // save article in DB
    Route::put('reader/save-article/{id}', [ArticleController::class, 'saveArticle'])->name('save-article');
    // delete saved articale from DB
    Route::delete('reader/delete-article/{id}', [ArticleController::class, 'deleteArticle'])->name('delete-article');
});

// route for followers
Route::middleware('auth')->group(function () {
    // save article in DB
    Route::put('reader/follow/{authorId}', [ArticleController::class, 'Follow'])->name('follow');
    // delete saved articale from DB
    Route::delete('reader/unfollow/{followId}', [ArticleController::class, 'unFollow'])->name('unfollow');
});

// route for like and dislike
Route::middleware('auth')->group(function () {
    // save like in DB
    Route::put('reader/like/{postId}', [ArticleController::class, 'Like'])->name('like');
    // dislike from DB
    Route::delete('reader/dislike/{dislikeId}', [ArticleController::class, 'Dislike'])->name('dislike');
});