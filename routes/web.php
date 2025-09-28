<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\TourismNewsController;
use App\Http\Controllers\PageController as PublicPageController;

/*
|--------------------------------------------------------------------------
| Dashboard & Auth
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/p/{slug}', [PublicPageController::class, 'show'])->name('page.show');

// Auth routes (guest only)
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');

    // POST: login
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

    // POST: register
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
});

// News (public)
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Tourism Places (public)
Route::get('/tourism', [TourismController::class, 'index'])->name('tourism.index');
Route::get('/tourism/{id}', [TourismController::class, 'show'])->name('tourism.show');

// Tourism News (public)
Route::get('/tourism-news', [TourismNewsController::class, 'index'])->name('tourism-news.index');
Route::get('/tourism-news/{id}', [TourismNewsController::class, 'show'])->name('tourism-news.show');

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    abort(404); // แทนที่จะ redirect ไปหน้าแรก
});

/*
|--------------------------------------------------------------------------
| Debug Helpers (non-production only)
|--------------------------------------------------------------------------
*/
if (!app()->environment('production')) {
    Route::get('/debug/login-check', [\App\Http\Controllers\DebugController::class, 'loginCheck']);
    Route::get('/debug/login-as-admin', [\App\Http\Controllers\DebugController::class, 'loginAsAdmin']);
    Route::get('/debug/users', [\App\Http\Controllers\DebugController::class, 'listUsers']);
    Route::get('/debug/set-admin-password', [\App\Http\Controllers\DebugController::class, 'setAdminPassword']);
    Route::get('/debug/db', [\App\Http\Controllers\DebugController::class, 'dbInfo']);
}
