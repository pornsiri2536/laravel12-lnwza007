<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;

class TourismPlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            [
                'name' => 'วัดพระแก้ว',
                'description' => 'วัดที่มีความสำคัญทางประวัติศาสตร์และเป็นแลนด์มาร์คของประเทศไทย',
                'location' => 'กรุงเทพมหานคร',
                'image' => 'wat_phra_keaw.jpg',
            ],
            [
                'name' => 'อุทยานแห่งชาติเขาใหญ่',
                'description' => 'อุทยานแห่งชาติที่มีธรรมชาติสวยงามและสัตว์ป่าหลากหลายชนิด',
                'location' => 'นครราชสีมา',
                'image' => 'khao_yai.jpg',
            ],
            [
                'name' => 'เกาะสมุย',
                'description' => 'เกาะที่มีชายหาดสวย น้ำทะเลใส เหมาะกับการพักผ่อน',
                'location' => 'สุราษฎร์ธานี',
                'image' => 'koh_samui.jpg',
            ],
            [
                'name' => 'น้ำตกเอราวัณ',
                'description' => 'น้ำตกที่มีชั้นสวยงาม เหมาะกับการเที่ยวธรรมชาติ',
                'location' => 'กาญจนบุรี',
                'image' => 'erawan_waterfall.jpg',
            ],
            [
                'name' => 'เมืองเก่าอยุธยา',
                'description' => 'เมืองประวัติศาสตร์ มีวัดเก่าและโบราณสถานมากมาย',
                'location' => 'พระนครศรีอยุธยา',
                'image' => 'ayutthaya.jpg',
            ],
            [
                'name' => 'อ่าวพังงา',
                'description' => 'อ่าวที่มีทิวทัศน์สวยงามและเกาะหินปูนขึ้นชื่อ',
                'location' => 'พังงา',
                'image' => 'phangnga_bay.jpg',
            ],
            [
                'name' => 'ดอยอินทนนท์',
                'description' => 'ยอดเขาที่สูงที่สุดในประเทศไทย มีอากาศเย็นตลอดปี',
                'location' => 'เชียงใหม่',
                'image' => 'doi_inthanon.jpg',
            ],
            [
                'name' => 'ตลาดน้ำดำเนินสะดวก',
                'description' => 'ตลาดน้ำชื่อดัง ชมวิถีชีวิตริมคลองและชิมอาหารท้องถิ่น',
                'location' => 'ราชบุรี',
                'image' => 'damnoen_saduak.jpg',
            ],
            [
                'name' => 'เขาสก',
                'description' => 'อุทยานแห่งชาติที่มีธรรมชาติสวยงาม น้ำตกและป่าไม้',
                'location' => 'สุราษฎร์ธานี',
                'image' => 'khao_sok.jpg',
            ],
            [
                'name' => 'หาดทรายแก้ว',
                'description' => 'ชายหาดทรายขาว น้ำทะเลใส เหมาะกับการเล่นน้ำ',
                'location' => 'ชลบุรี',
                'image' => 'sai_keaw_beach.jpg',
            ],
        ];

        foreach ($places as $place) {
            TourismPlace::create($place);
        }
    }
}
