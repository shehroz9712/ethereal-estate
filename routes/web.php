<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PreConstructionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pre-construction', [PreConstructionController::class, 'index'])->name('pre-construction');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::redirect('/featured-properties', '/properties');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');
Route::post('/properties/{property}/favorite', [PropertyController::class, 'toggleFavorite'])->name('properties.favorite');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/our-story', [PageController::class, 'ourStory'])->name('our-story');
Route::get('/genius', [PageController::class, 'genius'])->name('genius');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/rebate-calculator', [PageController::class, 'rebateCalculator'])->name('rebate-calculator');
Route::get('/join-ethereal', [PageController::class, 'joinEthereal'])->name('join-ethereal');

Route::get('/news', [ArticleController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('news.show');

/*
|--------------------------------------------------------------------------
| Inquiry & Lead Submissions
|--------------------------------------------------------------------------
*/
Route::post('/inquiries/contact', [InquiryController::class, 'submitContact'])->name('inquiries.contact');
Route::post('/inquiries/register', [InquiryController::class, 'submitRegistration'])->name('inquiries.register');
Route::post('/inquiries/join', [InquiryController::class, 'submitJoin'])->name('inquiries.join');
Route::post('/newsletter/subscribe', [InquiryController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Client / User Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'customer'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/saved-properties', [UserDashboardController::class, 'savedProperties'])->name('saved-properties');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Property Management
    Route::resource('properties', AdminPropertyController::class)->except(['show']);

    // Inquiries Management
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::patch('/inquiries/{inquiry}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.update-status');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Users Management
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('users.update-role');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Editorial Articles Management
    Route::get('/articles', [AdminArticleController::class, 'index'])->name('articles.index');
    Route::post('/articles', [AdminArticleController::class, 'store'])->name('articles.store');
    Route::delete('/articles/{article}', [AdminArticleController::class, 'destroy'])->name('articles.destroy');
});
