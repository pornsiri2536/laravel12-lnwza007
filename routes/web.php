<?php

use App\Http\Controllers\TourismController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TourismNewsController;
use App\Http\Controllers\PageController; // เพิ่มถ้าใช้ PageController
use App\Models\News;
use App\Models\TourismPlace;
use App\Models\TourismNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

// -----------------------
// Dashboard & Auth
// -----------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('dashboard'))->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

// -----------------------
// หน้าแรก (ดึงข้อมูลจาก Model)
// -----------------------
Route::get('/', function () {
    $news = News::latest()->take(5)->get();                    // ข่าวล่าสุด 5 ข่าว
    $tourismNews = TourismNews::with('eventDates')->latest()->take(5)->get();  // ข่าวการท่องเที่ยวล่าสุด 5 ข่าว
    $places = TourismPlace::latest()->take(5)->get();          // สถานที่ล่าสุด 5 แห่ง
    return view('home', compact('news', 'tourismNews', 'places'));
})->name('home');

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
Route::get('query/sql', fn() => view('query-test', [
    'products' => DB::select("SELECT * FROM products")
]));
Route::get('query/builder', fn() => view('query-test', [
    'products' => DB::table('products')->get()
]));
Route::get('query/orm', fn() => view('query-test', [
    'products' => []
]));
Route::get('product/form', fn() => '')->name("product.form");

// -----------------------
// Test Route
// -----------------------
Route::view('/test', 'test')->name('test');
Route::get('barchart', fn() => view('barchart'))->name('barchart');

// -----------------------
// Tourism Routes
// -----------------------
Route::get('/tourism', [TourismController::class, 'index'])->name('tourism.index');
Route::get('/tourism/{id}', [TourismController::class, 'show'])->name('tourism.show');
Route::resource('tourism', TourismController::class)->except(['index', 'show']);

// -----------------------
// News Routes
// -----------------------
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::resource('news', NewsController::class)->except(['index', 'show']);

// -----------------------
// Tourism News Routes
// -----------------------
Route::get('/tourism-news', [TourismNewsController::class, 'index'])->name('tourism-news.index');
Route::get('/tourism-news/{id}', [TourismNewsController::class, 'show'])->name('tourism-news.show');

// -----------------------
// About Page Route
// -----------------------
Route::get('/about', [PageController::class, 'about'])->name('about');
// -----------------------
// Product Routes (CRUD)
// -----------------------
Route::get('product-index', function () {
    $products = App\Models\Product::get();
    return view('query-test', compact('products'));
})->name("product.index");

Route::get('product-form', function () {
    return view('product-form');
})->name("product.form");

Route::post('product-submit', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $url = Storage::url($imagePath);
        $data["image"] = $url;
    }
    App\Models\Product::create($data);
    return redirect()->route('product.index')->with('success', 'เพิ่มสินค้าแล้ว!');
})->name('product.submit');

// แก้ไขข้อมูลสินค้า
Route::get('product-edit/{id}', function ($id) {
    $product = App\Models\Product::findOrFail($id);
    return view('product-form', compact('product'));
})->name('product.edit');

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
        $url = Storage::url($imagePath);
        $data["image"] = $url;
    }
    $product->update($data);
    return redirect()->route('product.index')->with('success', 'แก้ไขข้อมูลสินค้าแล้ว!');
})->name('product.update');

// ลบข้อมูลสินค้า
Route::post('product-delete/{id}', function ($id) {
    $product = App\Models\Product::findOrFail($id);
    $product->delete();
    return redirect()->route('product.index')->with('success', 'ลบข้อมูลสินค้าแล้ว!');
})->name('product.delete');
