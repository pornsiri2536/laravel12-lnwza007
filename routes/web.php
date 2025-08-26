<?php

use App\Http\Controllers\TourismController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// -----------------------
// หน้าแรก Inertia
// -----------------------
Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

// -----------------------
// Route เบื้องต้น
// -----------------------
Route::get("/homepage", fn() => "<h1>This is home page</h1>");
Route::get("/blog/{id}", fn($id) => "<h1>This is blog page : {$id}</h1>");
Route::get("/myorder/create", fn() => "<h1>This is order form page : " . request("username") . "</h1>");
Route::get("/hello", fn() => view("hello"));

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
        return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
    });

    Route::get('/ant', fn() => view("test/ant", [
        'ant' => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg"
    ]));

    Route::get('/bird', fn() => view("test/bird", [
        'bird' => "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg"
    ]));

    Route::get('/cat', fn() => view("test/cat", [
        'cat' => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg"
    ]));
});

// -----------------------
// Template views (Blade ธรรมดา)
// -----------------------
Route::view("/teacher", "teacher");
Route::view("/student", "student");
Route::view("/theme", "theme");

// -----------------------
// Active Template routes
// -----------------------
Route::prefix('active')->group(function () {
    Route::view('/index', 'active.index')->name('index');
    Route::view('/about', 'active.about')->name('about');
    Route::view('/services', 'active.services')->name('services');
    Route::view('/portfolio', 'active.portfolio')->name('portfolio');
    Route::view('/team', 'active.team')->name('team');
    Route::view('/blog', 'active.blog')->name('blog');
    Route::view('/contact', 'active.contact')->name('contact');

    // ✅ Route แสดงข้อมูลครูจาก JSON
    Route::get('/teacher', function () {
        $teachers = json_decode(file_get_contents(
            'https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'
        ));
        return view("active.teacher", compact("teachers"));
    })->name('active.teacher');
});
Route::get('query/sql', function () {
    $products = DB::select("SELECT * FROM products");
    // $products = DB::select("SELECT * FROM products WHERE price > 100");
    return view('query-test', compact('products'));
});

Route::get('query/builder', function () {
    $products = DB::table('products')->get();
    // $products = DB::table('products')->where('price', '>', 100)->get();
    return view('query-test', compact('products'));
});

Route::get('query/orm', function () {
    $products = Product::get();
    // $products = Product::where('price', '>', 100)->get();
    return view('query-test', compact('products'));
});

Route::get('product/form', function () {
    //
})->name("product.form");

// -----------------------
// Test Route
// -----------------------
Route::view('/test', 'test')->name('test');
Route::get('barchart', function () {    
    return view('barchart');
})->name('barchart');

// -----------------------
// Tourism Routes (Pathumthani)
// -----------------------
Route::get('/tourism', [TourismController::class, 'index'])->name('tourism.index');
Route::get('/tourism/show/{id}', [TourismController::class, 'show'])->name('tourism.show');
use App\Http\Controllers\NewsController;
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');











