<?php

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
Route::prefix('tourism')->group(function () {
    Route::get('/pathumthani', function () {
        $places =
$places = [
    [
        "name" => "วัดเจดีย์หอย",
        "image" => "https://www.tripgether.com/wp-content/uploads/2024/08/jedeehoi-13-2.jpg",
        "description" => "วัดที่มีเจดีย์สร้างจากซากหอยอายุหลายล้านปี ภายในวัดยังมีพิพิธภัณฑ์ซากหอยโบราณและพื้นที่ให้กราบไหว้พระพุทธรูปอันศักดิ์สิทธิ์ เป็นแลนด์มาร์กสำคัญของจังหวัดปทุมธานี"
    ],
    [
        "name" => "ตลาดน้ำคลองลัดมะยม",
        "image" => "https://cms.dmpcdn.com/travel/2024/07/08/1909ef30-3cea-11ef-be17-cd34bf335bbe_webp_original.webp",
        "description" => "ตลาดน้ำชื่อดังใกล้กรุงเทพฯ มีอาหารพื้นบ้านอร่อย ของฝากมากมาย ผักผลไม้สดจากสวน และกิจกรรมนั่งเรือชมบรรยากาศริมน้ำ เหมาะสำหรับมาเที่ยวกับครอบครัว"
    ],
    [
        "name" => "พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ",
        "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg/500px-Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg",
        "description" => "แหล่งเรียนรู้ด้านวิทยาศาสตร์ที่ใหญ่ที่สุดในประเทศไทย ภายในมีนิทรรศการแบบ Interactive การทดลองวิทยาศาสตร์ และกิจกรรมเสริมทักษะ เหมาะสำหรับครอบครัวและนักเรียน"
    ],
    [
        "name" => "เกาะเกร็ด",
        "image" => "https://roijang.com/wp-content/uploads/2023/08/shutterstock_1972740416.jpg",
        "description" => "ชุมชนเกาะกลางน้ำเจ้าพระยา มีชื่อเสียงด้านเครื่องปั้นดินเผา วัดวาอาราม ร้านอาหารพื้นบ้าน และของฝากมากมาย เหมาะสำหรับการเที่ยวเชิงวัฒนธรรม"
    ],
    [
        "name" => "วัดสิงห์",
        "image" => "https://cms.dmpcdn.com/travel/2021/01/06/2abcd040-4fee-11eb-89e4-35f1a97d3869_original.jpg",
        "description" => "วัดเก่าแก่ริมแม่น้ำเจ้าพระยา มีสถาปัตยกรรมงดงาม โดยเฉพาะพระอุโบสถที่มีจิตรกรรมฝาผนังแบบไทยดั้งเดิม บรรยากาศเงียบสงบ เหมาะแก่การปฏิบัติธรรม"
    ],
    [
        "name" => "น้ำตกวังก้านเหลือง จ.ลพบุรี ",
        "image" => "https://api.tourismthailand.org/upload/live/content_article/22069-19087.jpeg",
        "description" => "แหล่งท่องเที่ยวทางธรรมชาติที่มีน้ำให้เล่นตลอดทั้งปี เกิดจากแหล่งน้ำผุดจำนวนหลายจุดที่ผุดขึ้นมาจากลำห้วยมะกอก ไหลลงมารวมกันบริเวณสันหินปูน ทำให้เกิดเป็นน้ำตกกว้างประมาณ 20 เมตร และไหลลดหลั่นกันไปเป็นชั้น ๆ ถึงจะมีขนาดไม่ใหญ่มากแต่ความสวยงามไม่แพ้ที่อื่นแน่นอน บรรยากาศดี ล้อมรอบไปด้วยป่าไม้ และที่นี่น้ำยังใสเห็นปลากำลังแหวกว่ายชัดเจนเลย แถมมีหลายชั้นให้เดินชมความงามกันแบบชิลล์ ๆ เพราะทางเดินไม่ชัน เดินสะดวกสบายมาก ๆ ส่วนใครอยากมานอนค้างก็มีจุดบริการนำเต้นท์มากางกันได้ 

        Maps : สวนรุกชาติวังก้านเหลือง ตำบลท่าดินดำ อำเภอชัยบาดาล จังหวัดลพบุรี 
Facebook : น้ำตกวังก้านเหลือง อ.ชัยบาดาล จ.ลพบุรี l Wung Kan Leuang Waterfall 
โทร. 09 2909 1669 "
    ]
];

        return view("tourism.pathumthani", compact("places"));
    })->name("tourism.pathumthani");
});
