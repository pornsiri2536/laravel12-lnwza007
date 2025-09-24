<?php

use App\Http\Controllers\TourismController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TourismNewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminTourismNewsController;
use App\Http\Controllers\Admin\AdminTourismPlaceController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// -----------------------
// Dashboard & Auth
// -----------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'users' => App\Models\User::count(),
            'news' => App\Models\News::count(),
            'tourism_news' => App\Models\TourismNews::count(),
            'tourism_places' => App\Models\TourismPlace::count(),
        ];

        $recent_news = App\Models\News::latest()->take(5)->get();
        $recent_tourism_news = App\Models\TourismNews::latest()->take(5)->get();
        $recent_places = App\Models\TourismPlace::latest()->take(6)->get();

        return view('admin.dashboard', compact('stats','recent_news','recent_tourism_news','recent_places'));
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

// -----------------------
// Admin Routes
// -----------------------
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/content', [AdminController::class, 'contentManagement'])->name('admin.content');
    // Deprecated read-only users page remains available
    Route::get('/users', [AdminController::class, 'userManagement'])->name('admin.users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

    // News CRUD
    Route::resource('news', AdminNewsController::class)->names('admin.news');

    // Tourism News CRUD
    Route::resource('tourism-news', AdminTourismNewsController::class)->names('admin.tourism_news');

    // Tourism Places CRUD
    Route::resource('tourism-places', AdminTourismPlaceController::class)->names('admin.tourism_places');

    // Users Management CRUD
    Route::resource('user-mgmt', AdminUsersController::class)->names('admin.user_mgmt');
    Route::patch('user-mgmt/{user_mgmt}/toggle-status', [AdminUsersController::class, 'toggleStatus'])->name('admin.user_mgmt.toggle-status');
});

// -----------------------
// หน้าแรก
// -----------------------
Route::get('/', function () {
    $news = App\Models\News::latest()->take(5)->get();
    $tourismNews = App\Models\TourismNews::with('eventDates')->latest()->take(5)->get();
    $places = App\Models\TourismPlace::latest()->take(5)->get();
    return view('home', compact('news', 'tourismNews', 'places'));
})->name('home');

// -----------------------
// เบื้องต้น / Template Views
// -----------------------
Route::view('/teacher', 'teacher');
Route::view('/student', 'student');
Route::view('/theme', 'theme');
Route::get('/hello', fn() => view('hello'));

// -----------------------
// Gallery Routes
// -----------------------
Route::prefix('gallery')->group(function () {
    Route::get('/', function () {
        $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
        $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg"; 
        $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
        $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg"; 
        $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";
        return view("test/index", compact("ant","bird","cat","god","spider"));
    });

    Route::get('/ant', fn() => view("test/ant", ['ant' => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg"]));
    Route::get('/bird', fn() => view("test/bird", ['bird' => "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg"]));
    Route::get('/cat', fn() => view("test/cat", ['cat' => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg"]));
});

// -----------------------
// Active Template
// -----------------------
Route::prefix('active')->group(function () {
    Route::view('/index', 'active.index')->name('active.index');
    Route::view('/about', 'active.about')->name('active.about');
    Route::view('/services', 'active.services')->name('active.services');
    Route::view('/portfolio', 'active.portfolio')->name('active.portfolio');
    Route::view('/team', 'active.team')->name('active.team');
    Route::view('/blog', 'active.blog')->name('active.blog');
    Route::view('/contact', 'active.contact')->name('active.contact');

    Route::get('/teacher', function () {
        $teachers = json_decode(file_get_contents(
            'https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'
        ));
        return view("active.teacher", compact("teachers"));
    })->name('active.teacher');
});

// -----------------------
// Query Routes
// -----------------------
Route::get('query/sql', fn() => view('query-test', ['products' => DB::select("SELECT * FROM products")]));
Route::get('query/builder', fn() => view('query-test', ['products' => DB::table('products')->get()]));
Route::get('query/orm', fn() => view('query-test', ['products' => []]));

// -----------------------
// Test Routes
// -----------------------
Route::view('/test', 'test')->name('test');
Route::get('/barchart', fn() => view('barchart'))->name('barchart');

// -----------------------
// Tourism Routes
// -----------------------
Route::get('/tourism', [TourismController::class, 'index'])->name('tourism.index');
Route::get('/tourism/{id}', [TourismController::class, 'show'])->name('tourism.show');
Route::resource('tourism', TourismController::class)->except(['index','show']);

// -----------------------
// News Routes
// -----------------------
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::resource('news', NewsController::class)->except(['index','show']);

// -----------------------
// Tourism News Routes
// -----------------------
Route::get('/tourism-news', [TourismNewsController::class, 'index'])->name('tourism-news.index');
Route::get('/tourism-news/{id}', [TourismNewsController::class, 'show'])->name('tourism-news.show');

// -----------------------
// About Page
// -----------------------
Route::get('/about', [PageController::class, 'about'])->name('about');

// -----------------------
// Product Routes (CRUD)
// -----------------------
Route::get('product-index', fn() => view('query-test', ['products' => App\Models\Product::get()]))->name('product.index');
Route::get('product-form', fn() => view('product-form'))->name('product.form');

Route::post('product-submit', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $data["image"] = Storage::url($imagePath);
    }

    App\Models\Product::create($data);
    return redirect()->route('product.index')->with('success','เพิ่มสินค้าแล้ว!');
})->name('product.submit');

Route::get('product-edit/{id}', fn($id) => view('product-form', ['product' => App\Models\Product::findOrFail($id)]))->name('product.edit');

Route::post('product-update/{id}', function (Request $request, $id) {
    $product = App\Models\Product::findOrFail($id);
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $data["image"] = Storage::url($imagePath);
    }
    $product->update($data);
    return redirect()->route('product.index')->with('success','แก้ไขข้อมูลสินค้าแล้ว!');
})->name('product.update');

Route::post('product-delete/{id}', fn($id) => tap(App\Models\Product::findOrFail($id))->delete()->route('product.index')->with('success','ลบข้อมูลสินค้าแล้ว!'))->name('product.delete');
