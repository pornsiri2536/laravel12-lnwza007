<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->truncate();

        $newsImages = [
            '1.jpeg',
            'phi-phi-island.jpg',
            'KhaoSok.jpg',
            'thungprongthong.jpeg',
            'พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ.jpg',
            'ตลาดริมน้ำวัดศาลเจ้า.jpeg',
            'สกายวอล์คสองแคว.webp',
            'สวนสนุกดรีมเวิลด์.webp',
            'ตลาดน้ำคลองสระบัว.jpg',
            'kL.jpg',
        ];

        DB::table('news')->insert([
            [
                "title" => "🎉 เทศกาลกินกุ้งแม่น้ำสด!",
                "description" => "จังหวัดปทุมธานีจัดเทศกาลกินกุ้งแม่น้ำสดใหม่จากแม่น้ำเจ้าพระยา พร้อมกิจกรรมสนุกๆ และดนตรีสด 🦐🎶",
                "image" => "/assets/img/tourism/" . $newsImages[0],
                "link" => "https://www.patummail.com/news/river-prawn-festival",
                "created_at" => Carbon::now()->subDays(10),
                "updated_at" => Carbon::now()->subDays(10),
            ],
            [
                "title" => "🙏 งานนมัสการหลวงพ่อโต วัดโบสถ์",
                "description" => "ร่วมสักการะหลวงพ่อโตและชมการแสดงพื้นบ้านสุดประทับใจ ณ วัดโบสถ์ ปทุมธานี 🛕",
                "image" => "/assets/img/tourism/" . $newsImages[1],
                "link" => "https://www.thairath.co.th/lifestyle/buddha-boht",
                "created_at" => Carbon::now()->subDays(9),
                "updated_at" => Carbon::now()->subDays(9),
            ],
            [
                "title" => "🚣‍♂️ ประเพณีแข่งเรือยาวเจ้าพระยา",
                "description" => "การแข่งขันเรือยาวประเพณีริมแม่น้ำเจ้าพระยา สนุกสนานและคึกคัก พร้อมรางวัลมากมาย!",
                "image" => "/assets/img/tourism/" . $newsImages[2],
                "link" => "https://www.matichon.co.th/local/boat-race-chao-phraya",
                "created_at" => Carbon::now()->subDays(8),
                "updated_at" => Carbon::now()->subDays(8),
            ],
            [
                "title" => "🌸 ชมทุ่งดอกไม้เมืองปทุม",
                "description" => "นักท่องเที่ยวเดินชมทุ่งดอกไม้สีสันสดใสริมแม่น้ำ พร้อมจุดถ่ายรูปสุดฮิต 📸",
                "image" => "/assets/img/tourism/" . $newsImages[3],
                "link" => "https://www.paiduaykan.com/flower-field-pathum",
                "created_at" => Carbon::now()->subDays(7),
                "updated_at" => Carbon::now()->subDays(7),
            ],
            [
                "title" => "🛶 ตลาดน้ำคลองหลวง",
                "description" => "สัมผัสวิถีชีวิตริมน้ำ ซื้อของสดและอาหารพื้นบ้าน พร้อมกิจกรรมทางน้ำมากมาย",
                "image" => "/assets/img/tourism/" . $newsImages[4],
                "link" => "https://www.paiduaykan.com/klongluang-floating-market",
                "created_at" => Carbon::now()->subDays(6),
                "updated_at" => Carbon::now()->subDays(6),
            ],
            [
                "title" => "✨ งานประดับไฟยามค่ำคืน",
                "description" => "งานประดับไฟสุดอลังการในเทศกาลท้องถิ่น ถ่ายรูปสวยๆ ได้ทุกมุม 🌟",
                "image" => "/assets/img/tourism/" . $newsImages[5],
                "link" => "https://www.patummail.com/news/night-light-festival",
                "created_at" => Carbon::now()->subDays(5),
                "updated_at" => Carbon::now()->subDays(5),
            ],
            [
                "title" => "🍲 เทศกาลอาหารพื้นเมือง",
                "description" => "รวมอาหารพื้นบ้านอร่อยๆ ให้ชิมฟรีและขาย พร้อมกิจกรรมสาธิตการทำอาหาร",
                "image" => "/assets/img/tourism/" . $newsImages[6],
                "link" => "https://www.paiduaykan.com/local-food-festival",
                "created_at" => Carbon::now()->subDays(4),
                "updated_at" => Carbon::now()->subDays(4),
            ],
            [
                "title" => "🚴‍♀️ งานแข่งขันจักรยานทางไกล",
                "description" => "นักปั่นจากหลายจังหวัดเข้าร่วมแข่งขันเส้นทางสวยงาม พร้อมรางวัลและของที่ระลึก",
                "image" => "/assets/img/tourism/" . $newsImages[7],
                "link" => "https://www.thairath.co.th/lifestyle/bike-race-pathum",
                "created_at" => Carbon::now()->subDays(3),
                "updated_at" => Carbon::now()->subDays(3),
            ],
            [
                "title" => "🎭 งานแสดงศิลปวัฒนธรรม",
                "description" => "ศิลปินและนักแสดงท้องถิ่นโชว์วัฒนธรรมประจำจังหวัด พร้อมเวิร์กช็อปศิลปะ",
                "image" => "/assets/img/tourism/" . $newsImages[8],
                "link" => "https://www.matichon.co.th/local/culture-show-pathum",
                "created_at" => Carbon::now()->subDays(2),
                "updated_at" => Carbon::now()->subDays(2),
            ],
            [
                "title" => "🏊‍♂️ งานแข่งขันว่ายน้ำแม่น้ำเจ้าพระยา",
                "description" => "การแข่งขันว่ายน้ำในแม่น้ำเจ้าพระยา สนุกและตื่นเต้น พร้อมรางวัลใหญ่",
                "image" => "/assets/img/tourism/" . $newsImages[9],
                "link" => "https://www.patummail.com/news/chao-phraya-swim",
                "created_at" => Carbon::now()->subDay(),
                "updated_at" => Carbon::now()->subDay(),
            ],
            [
                "title" => "Amazing Thailand Festival 2025",
                "description" => "ร่วมงานเทศกาลท่องเที่ยวสุดยิ่งใหญ่แห่งปี พบกับกิจกรรม การแสดง และอาหารพื้นเมืองมากมาย ณ กรุงเทพมหานคร",
                "image" => "/assets/img/tourism/" . $newsImages[0],
                "link" => "https://www.tourismthailand.org/Events",
                "created_at" => Carbon::now()->subDays(5),
                "updated_at" => Carbon::now()->subDays(5),
            ],
            [
                "title" => "ประกวดภาพถ่ายธรรมชาติ",
                "description" => "เชิญชวนส่งภาพถ่ายธรรมชาติทั่วไทย ลุ้นรับรางวัลใหญ่และแสดงผลงานในนิทรรศการ",
                "image" => "/assets/img/tourism/" . $newsImages[1],
                "link" => "https://www.naturephotocontest.com",
                "created_at" => Carbon::now()->subDays(4),
                "updated_at" => Carbon::now()->subDays(4),
            ],
            [
                "title" => "งานวิ่งมาราธอนริมทะเล",
                "description" => "กิจกรรมวิ่งมาราธอนริมชายหาดที่สวยที่สุดในประเทศไทย พร้อมรับเสื้อและเหรียญที่ระลึก",
                "image" => "/assets/img/tourism/" . $newsImages[2],
                "link" => "https://www.thailandbeachmarathon.com",
                "created_at" => Carbon::now()->subDays(3),
                "updated_at" => Carbon::now()->subDays(3),
            ],
            [
                "title" => "เทศกาลอาหารพื้นเมือง",
                "description" => "รวมร้านอาหารพื้นเมืองชื่อดังจากทุกภาคทั่วไทยให้คุณได้ลิ้มลองในงานเดียว",
                "image" => "/assets/img/tourism/" . $newsImages[3],
                "link" => "https://www.thailandfoodfestival.com",
                "created_at" => Carbon::now()->subDays(2),
                "updated_at" => Carbon::now()->subDays(2),
            ],
            [
                "title" => "นิทรรศการศิลปะร่วมสมัย",
                "description" => "ชมผลงานศิลปะร่วมสมัยจากศิลปินไทยและต่างประเทศ ณ หอศิลป์กรุงเทพฯ",
                "image" => "/assets/img/tourism/" . $newsImages[4],
                "link" => "https://www.bacc.or.th/exhibition",
                "created_at" => Carbon::now()->subDay(),
                "updated_at" => Carbon::now()->subDay(),
            ],
        ]);
    }
}
