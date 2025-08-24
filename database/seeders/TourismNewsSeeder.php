<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tourism_news')->insert([
            [
                "title" => "เทศกาลกินกุ้งแม่น้ำปทุมธานี 2025",
                "content" => "จังหวัดปทุมธานีจัดงานเทศกาลกินกุ้งแม่น้ำสุดยิ่งใหญ่ รวบรวมร้านอาหารชื่อดังและเมนูเด็ดมากมาย พร้อมกิจกรรมดนตรีสดและการแสดงพื้นบ้าน เพื่อส่งเสริมการท่องเที่ยวริมแม่น้ำเจ้าพระยา",
                "image" => "https://picsum.photos/500?random=1",
                "published_at" => "2025-01-15",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => "งานแห่เทียนเข้าพรรษาวัดสิงห์",
                "content" => "ชาวบ้านและนักท่องเที่ยวร่วมสืบสานประเพณีแห่เทียนเข้าพรรษา ณ วัดสิงห์ จังหวัดปทุมธานี ภายในงานมีการตกแต่งขบวนเทียนอย่างสวยงาม พร้อมกิจกรรมทางวัฒนธรรมและการละเล่นพื้นบ้าน",
                "image" => "https://picsum.photos/500?random=2",
                "published_at" => "2025-07-20",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
