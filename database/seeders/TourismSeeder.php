<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                "description" => "วัดเก่าแก่มีเจดีย์สร้างจากเปลือกหอยนับล้านชิ้น อายุหลายล้านปี",
                "location" => "อำเภอเมืองปทุมธานี",
                "image_url" => "https://www.tripgether.com/wp-content/uploads/2024/08/jedeehoi-2.jpg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Dream World",
                "description" => "สวนสนุกระดับประเทศ มีกิจกรรมและเครื่องเล่นหลากหลาย",
                "location" => "อำเภอธัญบุรี",
                "image_url" => "https://www.paiduaykan.com/travel/wp-content/uploads/2021/06/7-SON04090.jpg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "ตลาดน้ำคลองลัดมะยม",
                "description" => "สัมผัสวิถีชีวิตริมน้ำ ชิมอาหารพื้นบ้านและซื้อของฝาก",
                "location" => "อำเภอเมืองปทุมธานี",
                "image_url" => "https://www.paiduaykan.com/travel/wp-content/uploads/2021/06/3-SON03822.jpg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ",
                "description" => "เรียนรู้เทคโนโลยีและวิทยาศาสตร์แบบสนุกสนานทั้งเด็กและผู้ใหญ่",
                "location" => "อำเภอคลองหลวง",
                "image_url" => "https://www.paiduaykan.com/travel/wp-content/uploads/2021/06/5-SON03988.jpg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "สวนพฤกษศาสตร์",
                "description" => "เดินชมสวนพฤกษศาสตร์และพันธุ์ไม้หายาก",
                "location" => "อำเภอคลองหลวง",
                "image_url" => "https://picsum.photos/id/101/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "สะพานพระราม 5",
                "description" => "แลนด์มาร์คสำคัญของจังหวัด ชมวิวแม่น้ำเจ้าพระยา",
                "location" => "อำเภอเมืองปทุมธานี",
                "image_url" => "https://picsum.photos/id/102/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "ตลาดร้อยปีวัดเสด็จ",
                "description" => "ตลาดเก่าแก่ แหล่งรวมของกินและของฝากพื้นบ้าน",
                "location" => "อำเภอเมืองปทุมธานี",
                "image_url" => "https://picsum.photos/id/103/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "สวนสุขภาพปทุมธานี",
                "description" => "สถานที่ออกกำลังกายและพักผ่อน เหมาะกับทุกวัย",
                "location" => "อำเภอเมืองปทุมธานี",
                "image_url" => "https://picsum.photos/id/104/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "วัดโบสถ์",
                "description" => "วัดเก่าแก่ มีสถาปัตยกรรมไทยโบราณและงานประติมากรรมสวยงาม",
                "location" => "อำเภอสามโคก",
                "image_url" => "https://picsum.photos/id/105/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "ฟาร์มโชคชัย ปทุมธานี",
                "description" => "ฟาร์มโคนมและกิจกรรมท่องเที่ยวเชิงเกษตร สำหรับครอบครัว",
                "location" => "อำเภอคลองหลวง",
                "image_url" => "https://picsum.photos/id/106/600/400",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
