<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tourism_places')->insert([
            [
                "name" => "หาดแสงจันทร์",
                "description" => "ตะลุยหาดแสงจันทร์ แลนด์มาร์กมหัศจรรย์แห่งเมืองระยอง",
                "location" => "ตำบลปากน้ำ อำเภอเมือง จังหวัดระยอง",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/4/4d/Wat_Jedi_Hoi_Pathumthani.jpg",
            ],
            [
                "name" => "วัดดอนใหญ่",
                "description" => "ไหว้พระ ลอดบ่วงนาคราช ขอพรท้าวเวสสุวรรณศักดิ์สิทธิ์",
                "location" => "อำเภอลำลูกกา จังหวัดปทุมธานี",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/6/6a/Floating_market.jpg",
            ],
            [
                "name" => "อุทยานแห่งชาติเขาสามร้อยยอด",
                "description" => " พิชิตถ้ำพระยานคร ยลโฉมบึงบัวกว้าง",
                "location" => "อำเภอสามร้อยยอดและอำเภอกุยบุรี จังหวัดประจวบคีรีขันธ์ ",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/1/12/Science_Museum_Thailand.jpg",
            ],
            [
                "name" => "เกาะล้าน",
                "description" => "นั่งพักผ่อนชิล ๆ ชมวิวริมทะเล ",
                "location" => "แขวงหนึ่งในเมืองพัทยา จังหวัดชลบุรี",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/8/8d/Thai_riverside_market.jpg",
            ],
            [
                "name" => "ทุ่งโปรงทอง",
                "description" => "ต้นไม้เขียวๆเหลือง ป่าโกงกางดี",
                "location" => "อ.แกลง จังหวัดระยอง",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/e/e3/Dreamworld_Thailand.jpg",
            ],
            [
                "name" => "อุทยานหินเขางู",
                "description" => "ภูเขาหินปูน สุดปัง ต้องไปเช็คอิน",
                "location" => "ตำบลเกาะพลับพลา อำเภอเมือง จังหวัดราชบุรี",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/7/7f/Wat_Bot_Pathum_Thani.jpg",
            ],
            [
                "name" => "สกายวอล์คสองแคว",
                "description" => "สกายวอร์คสองแคว แม่กลอง",
                "location" => " อำเภอเมือง จังหวัดกาญจนบุรี",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/5/52/Agriculture_Museum_PathumThani.jpg",
            ],
            [
                "name" => "เขาช่องลม",
                "description" => "ดินแดนมหัศจรรย์ เขาช่องลม",
                "location" => "ตั้งอยู่หลังเขื่อนขุนด่านปราการชล จังหวัดนครนายก",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/3/39/Wat_Phai_Lom_Pathumthani.jpg",
            ],
            [
                "name" => " วัดพระเเก้ว",
                "description" => "วัดคู่บ้านคู่เมืองของประเทศไทย และกรุงรัตนโกสินทร์",
                "location" => "จังหวัดกรุงเทพฯ",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/1/1d/Koh_Kret_Pottery.jpg",
            ],
            [
                "name" => "ถ้ำมรกต",
                "description" => "ถ้ำมรกตอันล้ำค่าแห่งอันดามัน",
                "location" => "จังหวัดตรัง",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/4/4c/Samkhok_Market.jpg",
            ],
        ]);
    }
}
