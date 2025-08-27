<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismNewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                "title" => "งานเทศกาลท่องเที่ยวประจำปี",
                "description" => "จังหวัดปทุมธานีจัดงานท่องเที่ยวสุดยิ่งใหญ่ พร้อมกิจกรรมมากมาย...",
                "image" => "https://pathumthani.prd.go.th/th/content/category/detail/id/431/iid/279324.jpg",
                "link" => "#"
            ],
            [
                "title" => "เปิดตลาดน้ำใหม่",
                "description" => "ตลาดน้ำแห่งใหม่เปิดให้บริการแล้ว พร้อมร้านค้าและอาหารพื้นบ้าน...",
                "image" => "floating_market.jpg",
                "link" => "#"
            ],
            [
                "title" => "งานวิ่งมาราธอนริมเจ้าพระยา",
                "description" => "ร่วมงานวิ่งมาราธอนริมแม่น้ำเจ้าพระยาเพื่อสุขภาพที่ดี...",
                "image" => "marathon.jpg",
                "link" => "#"
            ],
            [
                "title" => "เที่ยวชมวัดเก่าแก่",
                "description" => "วัดเก่าแก่ในปทุมธานีเปิดให้นักท่องเที่ยวเข้าชมความงดงามทางประวัติศาสตร์...",
                "image" => "ancient_temple.jpg",
                "link" => "#"
            ],
            [
                "title" => "งานลอยกระทงริมแม่น้ำ",
                "description" => "สัมผัสบรรยากาศงานลอยกระทงสุดโรแมนติกที่ปทุมธานี...",
                "image" => "loy_kratong.jpg",
                "link" => "#"
            ],
            [
                "title" => "ตลาดโบราณย้อนยุค",
                "description" => "ตลาดโบราณที่รวบรวมของกินและสินค้าพื้นบ้านสุดคลาสสิค...",
                "image" => "ancient_market.jpg",
                "link" => "#"
            ],
            [
                "title" => "ชมสวนดอกไม้ฤดูหนาว",
                "description" => "สวนดอกไม้สวยงามพร้อมมุมถ่ายรูปมากมาย เหมาะสำหรับครอบครัว...",
                "image" => "flower_garden.jpg",
                "link" => "#"
            ],
            [
                "title" => "เทศกาลผลไม้ปทุมธานี",
                "description" => "ชิมผลไม้สดใหม่จากสวน และเลือกซื้อของฝากสุดพิเศษ...",
                "image" => "fruit_festival.jpg",
                "link" => "#"
            ],
            [
                "title" => "กิจกรรมล่องเรือเจ้าพระยา",
                "description" => "ล่องเรือชมวิวแม่น้ำเจ้าพระยาในบรรยากาศยามเย็นสุดโรแมนติก...",
                "image" => "river_cruise.jpg",
                "link" => "#"
            ],
            [
                "title" => "เทศกาลอาหารพื้นบ้าน",
                "description" => "พบกับอาหารพื้นบ้านสูตรเด็ดจากชาวปทุมธานี รสชาติอร่อยไม่เหมือนใคร...",
                "image" => "local_food.jpg",
                "link" => "#"
            ]
        ];

        DB::table('tourism_news')->insert($newsData);
    }
}
