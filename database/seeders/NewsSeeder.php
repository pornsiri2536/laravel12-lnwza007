<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert([
            [
                "title" => "เทศกาลกินกุ้งแม่น้ำ",
                "content" => "จังหวัดปทุมธานีจัดเทศกาลกินกุ้งแม่น้ำสดใหม่จากแม่น้ำเจ้าพระยา",
                "image" => "https://image.makewebeasy.net/makeweb/m_1920x0/D4lr6Y9nB/attachfile/1_69.jpg",
                "published_at" => Carbon::now()->subDays(10),
            ],
            [
                "title" => "งานนมัสการหลวงพ่อโต",
                "content" => "ชาวบ้านและนักท่องเที่ยวร่วมงานนมัสการหลวงพ่อโต วัดโบสถ์",
                "image" => "https://picsum.photos/id/102/600/400",
                "published_at" => Carbon::now()->subDays(9),
            ],
            [
                "title" => "ประเพณีแข่งเรือยาว",
                "content" => "การแข่งขันเรือยาวประเพณีริมแม่น้ำเจ้าพระยา สนุกสนานและคึกคัก",
                "image" => "https://picsum.photos/id/103/600/400",
                "published_at" => Carbon::now()->subDays(8),
            ],
            [
                "title" => "ชมทุ่งดอกไม้เมืองปทุม",
                "content" => "นักท่องเที่ยวเดินชมทุ่งดอกไม้สีสันสดใสริมแม่น้ำ",
                "image" => "https://picsum.photos/id/104/600/400",
                "published_at" => Carbon::now()->subDays(7),
            ],
            [
                "title" => "ตลาดน้ำคลองหลวง",
                "content" => "สัมผัสวิถีชีวิตริมน้ำ ซื้อของสดและอาหารพื้นบ้าน",
                "image" => "https://picsum.photos/id/105/600/400",
                "published_at" => Carbon::now()->subDays(6),
            ],
            [
                "title" => "งานประดับไฟยามค่ำคืน",
                "content" => "งานประดับไฟสุดอลังการในเทศกาลท้องถิ่น",
                "image" => "https://picsum.photos/id/106/600/400",
                "published_at" => Carbon::now()->subDays(5),
            ],
            [
                "title" => "เทศกาลอาหารพื้นเมือง",
                "content" => "รวมอาหารพื้นบ้านอร่อยๆ ให้ชิมฟรีและขาย",
                "image" => "https://picsum.photos/id/107/600/400",
                "published_at" => Carbon::now()->subDays(4),
            ],
            [
                "title" => "งานแข่งขันจักรยานทางไกล",
                "content" => "นักปั่นจากหลายจังหวัดเข้าร่วมแข่งขันเส้นทางสวยงาม",
                "image" => "https://picsum.photos/id/108/600/400",
                "published_at" => Carbon::now()->subDays(3),
            ],
            [
                "title" => "งานแสดงศิลปวัฒนธรรม",
                "content" => "ศิลปินและนักแสดงท้องถิ่นโชว์วัฒนธรรมประจำจังหวัด",
                "image" => "https://picsum.photos/id/109/600/400",
                "published_at" => Carbon::now()->subDays(2),
            ],
            [
                "title" => "งานแข่งขันว่ายน้ำแม่น้ำเจ้าพระยา",
                "content" => "การแข่งขันว่ายน้ำในแม่น้ำเจ้าพระยา สนุกและตื่นเต้น",
                "image" => "https://picsum.photos/id/110/600/400",
                "published_at" => Carbon::now()->subDay(),
            ],
        ]);
    }
}

