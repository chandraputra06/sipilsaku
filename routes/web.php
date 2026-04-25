<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminCourseVideoController;
use App\Http\Controllers\AdminEbookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/faq', function () {
    return view('pages.faq.index');
})->name('faq');

Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');

/*
|--------------------------------------------------------------------------
| Guest Only
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Authenticated User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/photo', [ProfileController::class, 'destroyPhoto'])->name('photo.destroy');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    });

    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/ebook/{slug}', [CheckoutController::class, 'ebook'])->name('ebook');
        Route::post('/ebook/{slug}/whatsapp', [CheckoutController::class, 'ebookWhatsapp'])->name('ebook.whatsapp');

        Route::get('/course/{slug}', [CheckoutController::class, 'course'])->name('course');
        Route::post('/course/{slug}/whatsapp', [CheckoutController::class, 'courseWhatsapp'])->name('course.whatsapp');
    });
});

/*
|--------------------------------------------------------------------------
| Public Catalog
|--------------------------------------------------------------------------
*/

Route::prefix('ebooks')->name('ebooks.')->group(function () {
    Route::get('/', [EbookController::class, 'index'])->name('index');
    Route::get('/{slug}', [EbookController::class, 'show'])->name('show');
});

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('courses', AdminCourseController::class);
    Route::resource('ebooks', AdminEbookController::class);
    Route::resource('users', UserController::class)->only([
        'index',
        'show',
        'edit',
        'update',
        'destroy',
    ]);

    Route::put('/users/{user}/course-orders/{courseOrder}', [UserController::class, 'updateCourseAccess'])
        ->name('users.course-orders.update');

    Route::get('/courses/{course}/videos', [AdminCourseVideoController::class, 'index'])->name('courses.videos.index');
    Route::get('/courses/{course}/videos/create', [AdminCourseVideoController::class, 'create'])->name('courses.videos.create');
    Route::post('/courses/{course}/videos', [AdminCourseVideoController::class, 'store'])->name('courses.videos.store');
    Route::get('/courses/videos/{video}/edit', [AdminCourseVideoController::class, 'edit'])->name('courses.videos.edit');
    Route::put('/courses/videos/{video}', [AdminCourseVideoController::class, 'update'])->name('courses.videos.update');
    Route::delete('/courses/videos/{video}', [AdminCourseVideoController::class, 'destroy'])->name('courses.videos.destroy');
    Route::put('/users/{user}/course-orders/{courseOrder}', [UserController::class, 'updateCourseAccess'])
    ->name('users.course-orders.update');
});