<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;

class TourismPlaceSeeder extends Seeder
{
    public function run(): void
    {
        // Array of available tourism images
        $tourismImages = [
            '99.jpg',
            '88.jpg',
            '-2.jpg',
            '77.jpg',
            '2.jpg',
            'S__53534773_0-1200x800.jpg',
            'aeff974d-391f-40d4-863a-be58347ffa6d.jpg',
            'a1.jpg',
            'fc96df4d-bc64-4ebf-b8c2-336c7166e7f5.jpg',
            '25ebc070-b632-11ec-84fd-fd33c6b83720_webp_original.jpg',
            '1.jpeg',
            '9e834a50-c468-11ec-83ec-67daccb937c6_webp_original.jpg',
            'thungprongthong.jpeg',
            'kdiv8yacqzsu.jpg',
            '1695898634Thailand01.jpg',
            'licensed-image.jpg',
            'TR.jpg',
            'IO.jpg',
            'สกายวอล์คสองแคว.webp',
            'To.webp',
            'วัดป่าคลอง11.jpg',
            'ภป-พิพิธภัณฑ์เกษตร.jpg',
            'วัดโบสถ์ (หลวงพ่อโต).jpg',
            'สวนสนุกดรีมเวิลด์.webp',
            'ตลาดริมน้ำวัดศาลเจ้า.jpeg',
            'ตลาดน้ำคลองสระบัว.jpg',
            'พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ.jpg',
            'วัดเจย์ดีหอย.jpg'
        ];

        $places = [
            [
                'name' => 'วัดพระแก้ว',
                'description' => 'วัดที่มีความสำคัญทางประวัติศาสตร์และเป็นแลนด์มาร์คของประเทศไทย',
                'image' => '/assets/img/tourism/' . $tourismImages[0],
            ],
            [
                'name' => 'อุทยานแห่งชาติเขาใหญ่',
                'description' => 'อุทยานแห่งชาติที่มีธรรมชาติสวยงามและสัตว์ป่าหลากหลายชนิด',
                'image' => '/assets/img/tourism/' . $tourismImages[1],
            ],
            [
                'name' => 'เกาะสมุย',
                'description' => 'เกาะที่มีชายหาดสวย น้ำทะเลใส เหมาะกับการพักผ่อน',
                'image' => '/assets/img/tourism/' . $tourismImages[2],
            ],
            [
                'name' => 'น้ำตกเอราวัณ',
                'description' => 'น้ำตกที่มีชั้นสวยงาม เหมาะกับการเที่ยวธรรมชาติ',
                'image' => '/assets/img/tourism/' . $tourismImages[3],
            ],
            [
                'name' => 'เมืองเก่าอยุธยา',
                'description' => 'เมืองประวัติศาสตร์ มีวัดเก่าและโบราณสถานมากมาย',
                'image' => '/assets/img/tourism/' . $tourismImages[4],
            ],
            [
                'name' => 'อ่าวพังงา',
                'description' => 'อ่าวที่มีทิวทัศน์สวยงามและเกาะหินปูนขึ้นชื่อ',
                'image' => '/assets/img/tourism/' . $tourismImages[5],
            ],
            [
                'name' => 'ดอยอินทนนท์',
                'description' => 'ยอดเขาที่สูงที่สุดในประเทศไทย มีอากาศเย็นตลอดปี',
                'image' => '/assets/img/tourism/' . $tourismImages[6],
            ],
            [
                'name' => 'ตลาดน้ำดำเนินสะดวก',
                'description' => 'ตลาดน้ำชื่อดัง ชมวิถีชีวิตริมคลองและชิมอาหารท้องถิ่น',
                'image' => '/assets/img/tourism/' . $tourismImages[7],
            ],
            [
                'name' => 'เขาสก',
                'description' => 'อุทยานแห่งชาติที่มีธรรมชาติสวยงาม น้ำตกและป่าไม้',
                'image' => '/assets/img/tourism/' . $tourismImages[8],
            ],
            [
                'name' => 'หาดทรายแก้ว',
                'description' => 'ชายหาดทรายขาว น้ำทะเลใส เหมาะกับการเล่นน้ำ',
                'image' => '/assets/img/tourism/' . $tourismImages[9],
            ],
        ];

        foreach ($places as $place) {
            TourismPlace::create($place);
        }
    }
}
