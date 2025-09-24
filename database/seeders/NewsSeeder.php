<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure clean slate so the newest items are the ones with valid images
        DB::table('news')->truncate();

        // Use existing images under public/assets/img/tourism (these files exist)
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
                "title" => "เทศกาลกินกุ้งแม่น้ำ",
                "description" => "จังหวัดปทุมธานีจัดเทศกาลกินกุ้งแม่น้ำสดใหม่จากแม่น้ำเจ้าพระยา",
                "image" => "/assets/img/tourism/" . $newsImages[0],
                "link" => "https://example.com/news/1",
                "created_at" => Carbon::now()->subDays(10),
                "updated_at" => Carbon::now()->subDays(10),
            ],
            [
                "title" => "งานนมัสการหลวงพ่อโต",
                "description" => "ชาวบ้านและนักท่องเที่ยวร่วมงานนมัสการหลวงพ่อโต วัดโบสถ์",
                "image" => "/assets/img/tourism/" . $newsImages[1],
                "link" => "https://example.com/news/2",
                "created_at" => Carbon::now()->subDays(9),
                "updated_at" => Carbon::now()->subDays(9),
            ],
            [
                "title" => "ประเพณีแข่งเรือยาว",
                "description" => "การแข่งขันเรือยาวประเพณีริมแม่น้ำเจ้าพระยา สนุกสนานและคึกคัก",
                "image" => "/assets/img/tourism/" . $newsImages[2],
                "link" => "https://example.com/news/3",
                "created_at" => Carbon::now()->subDays(8),
                "updated_at" => Carbon::now()->subDays(8),
            ],
            [
                "title" => "ชมทุ่งดอกไม้เมืองปทุม",
                "description" => "นักท่องเที่ยวเดินชมทุ่งดอกไม้สีสันสดใสริมแม่น้ำ",
                "image" => "/assets/img/tourism/" . $newsImages[3],
                "link" => "https://example.com/news/4",
                "created_at" => Carbon::now()->subDays(7),
                "updated_at" => Carbon::now()->subDays(7),
            ],
            [
                "title" => "ตลาดน้ำคลองหลวง",
                "description" => "สัมผัสวิถีชีวิตริมน้ำ ซื้อของสดและอาหารพื้นบ้าน",
                "image" => "/assets/img/tourism/" . $newsImages[4],
                "link" => "https://example.com/news/5",
                "created_at" => Carbon::now()->subDays(6),
                "updated_at" => Carbon::now()->subDays(6),
            ],
            [
                "title" => "งานประดับไฟยามค่ำคืน",
                "description" => "งานประดับไฟสุดอลังการในเทศกาลท้องถิ่น",
                "image" => "/assets/img/tourism/" . $newsImages[5],
                "link" => "https://example.com/news/6",
                "created_at" => Carbon::now()->subDays(5),
                "updated_at" => Carbon::now()->subDays(5),
            ],
            [
                "title" => "เทศกาลอาหารพื้นเมือง",
                "description" => "รวมอาหารพื้นบ้านอร่อยๆ ให้ชิมฟรีและขาย",
                "image" => "/assets/img/tourism/" . $newsImages[6],
                "link" => "https://example.com/news/7",
                "created_at" => Carbon::now()->subDays(4),
                "updated_at" => Carbon::now()->subDays(4),
            ],
            [
                "title" => "งานแข่งขันจักรยานทางไกล",
                "description" => "นักปั่นจากหลายจังหวัดเข้าร่วมแข่งขันเส้นทางสวยงาม",
                "image" => "/assets/img/tourism/" . $newsImages[7],
                "link" => "https://example.com/news/8",
                "created_at" => Carbon::now()->subDays(3),
                "updated_at" => Carbon::now()->subDays(3),
            ],
            [
                "title" => "งานแสดงศิลปวัฒนธรรม",
                "description" => "ศิลปินและนักแสดงท้องถิ่นโชว์วัฒนธรรมประจำจังหวัด",
                "image" => "/assets/img/tourism/" . $newsImages[8],
                "link" => "https://example.com/news/9",
                "created_at" => Carbon::now()->subDays(2),
                "updated_at" => Carbon::now()->subDays(2),
            ],
            [
                "title" => "งานแข่งขันว่ายน้ำแม่น้ำเจ้าพระยา",
                "description" => "การแข่งขันว่ายน้ำในแม่น้ำเจ้าพระยา สนุกและตื่นเต้น",
                "image" => "/assets/img/tourism/" . $newsImages[9],
                "link" => "https://example.com/news/10",
                "created_at" => Carbon::now()->subDay(),
                "updated_at" => Carbon::now()->subDay(),
            ],
        ]);
    }
}
