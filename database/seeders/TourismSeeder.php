<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tourism_places')->insert([
            [
                "name" => "วัดเจดีย์หอย",
                "image" => "https://www.tripgether.com/wp-content/uploads/2024/08/jedeehoi-13-2.jpg",
                "description" => "วัดที่มีเจดีย์สร้างจากซากหอยอายุหลายล้านปี ภายในวัดยังมีพิพิธภัณฑ์ซากหอยโบราณและพื้นที่ให้กราบไหว้พระพุทธรูปอันศักดิ์สิทธิ์ เป็นแลนด์มาร์กสำคัญของจังหวัดปทุมธานี",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "ตลาดน้ำคลองลัดมะยม",
                "image" => "https://cms.dmpcdn.com/travel/2024/07/08/1909ef30-3cea-11ef-be17-cd34bf335bbe_webp_original.webp",
                "description" => "ตลาดน้ำชื่อดังใกล้กรุงเทพฯ มีอาหารพื้นบ้านอร่อย ของฝากมากมาย ผักผลไม้สดจากสวน และกิจกรรมนั่งเรือชมบรรยากาศริมน้ำ เหมาะสำหรับมาเที่ยวกับครอบครัว",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg/500px-Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg",
                "description" => "แหล่งเรียนรู้ด้านวิทยาศาสตร์ที่ใหญ่ที่สุดในประเทศไทย ภายในมีนิทรรศการแบบ Interactive การทดลองวิทยาศาสตร์ และกิจกรรมเสริมทักษะ เหมาะสำหรับครอบครัวและนักเรียน",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
