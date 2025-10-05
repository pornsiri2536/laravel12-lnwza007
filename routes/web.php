<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminTourismNewsController;
use App\Http\Controllers\Admin\AdminTourismPlaceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\DashboardSettingsController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\TourismNewsController;
use App\Http\Controllers\TourismPlaceController;
use App\Http\Controllers\PageController as PublicPageController;

use App\Http\Controllers\DebugController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/p/{slug}', [PublicPageController::class, 'show'])->name('page.show');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Tourism Places
Route::get('/tourism', [TourismPlaceController::class, 'index'])->name('tourism.index');
Route::get('/tourism/{id}', [TourismPlaceController::class, 'show'])->name('tourism.show');

// Tourism News
Route::get('/tourism-news', [TourismNewsController::class, 'index'])->name('tourism-news.index');
Route::get('/tourism-news/{id}', [TourismNewsController::class, 'show'])->name('tourism-news.show');

// Auth (guest only)
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
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

// routes/web.php
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('registration', [App\Http\Controllers\Auth\CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\Auth\CustomAuthController::class, 'customRegistration'])->name('register.custom');
/*|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard & pages
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::get('/content', [AdminController::class, 'contentManagement'])->name('content');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // User Management
    Route::resource('users', AdminUsersController::class);
    Route::patch('users/{user}/toggle-status', [AdminUsersController::class, 'toggleStatus'])->name('users.toggle-status');

    // News & Tourism Management
    Route::resource('news', AdminNewsController::class)->except(['show']);
    Route::resource('tourism-news', AdminTourismNewsController::class)->except(['show']);
    Route::resource('tourism-places', AdminTourismPlaceController::class)->except(['show']);
    Route::resource('pages', AdminPageController::class)->except(['show']);

    // Roles & Permissions
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    // Toggle Status
    Route::patch('roles/{role}/toggle-status', [RoleController::class, 'toggleStatus'])->name('roles.toggle-status');
    Route::patch('permissions/{permission}/toggle-status', [PermissionController::class, 'toggleStatus'])->name('permissions.toggle-status');

    // Dashboard Settings
    Route::post('/dashboard-settings', [DashboardSettingsController::class, 'save'])->name('dashboard-settings.save');
});

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    abort(404); // หรือ redirect('/') ได้ตามต้องการ
});

/*
|--------------------------------------------------------------------------
| Debug Helpers (non-production only)
|--------------------------------------------------------------------------
*/
if (!app()->environment('production')) {
    Route::prefix('debug')->group(function () {
        Route::get('/login-check', [DebugController::class, 'loginCheck']);
        Route::get('/login-as-admin', [DebugController::class, 'loginAsAdmin']);
        Route::get('/users', [DebugController::class, 'listUsers']);
        Route::get('/set-admin-password', [DebugController::class, 'setAdminPassword']);
        Route::get('/db', [DebugController::class, 'dbInfo']);
      
    });
}
