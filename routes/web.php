<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublishBlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




// Route::get('', function () {
//     return view('dashboard.author');
// })
// Route::get('/', [SingleActionController::class, 'index'])->name('home');
// Route::get('/users/@youssef-erremili', [PublishBlogController::class, 'show'])->name('reader');
// Route::view('read-article', 'dashboard.read-article')


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/web-development', function () {
    return view('index');
})->name('web-development');

Route::get('/author/{id}/@{author}', [ProfileController::class, 'author'])->name('author');
Route::get('/reader/{id}/{writer}/{title}', [PublishBlogController::class, 'show'])->name('reader');



Route::middleware('guest')->group(function () {
    // sign-up
    Route::view('/authorisation/sign-up', 'auth.sign-up')->name('sign-up');
    Route::post('/authorisation/sign-up', [AuthController::class, 'register']);
    // login
    Route::view('/authorisation/login', 'auth.login')->name('login');
    Route::post('/authorisation/login', [AuthController::class, 'login']);
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
    Route::put('reader/save-article/{id}', [DashboardController::class, 'saveArticle'])->name('save-article');
    // delete saved articale from DB
    Route::delete('reader/delete-article/{id}', [DashboardController::class, 'deleteArticle'])->name('delete-article');
});

// route for followers
Route::middleware('auth')->group(function () {
    // save article in DB
    Route::put('reader/follow/{authorId}', [DashboardController::class, 'follow'])->name('follow');
    // delete saved articale from DB
    Route::delete('reader/unfollow/{followId}', [DashboardController::class, 'unFollow'])->name('unfollow');
});