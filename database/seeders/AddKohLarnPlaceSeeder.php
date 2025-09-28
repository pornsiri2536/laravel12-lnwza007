<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;

class AddKohLarnPlaceSeeder extends Seeder
{
    public function run(): void
    {
        // ลบข้อมูลเดิมก่อน seeding เพื่อป้องกัน duplicate
        \App\Models\TourismPlace::truncate();

        $places = [
            [
                'name' => 'เกาะล้าน, ชลบุรี',
                'description' => 'เกาะสวยใกล้พัทยา น้ำทะเลใส หาดทรายขาว กิจกรรมดำน้ำตื้น พายเรือคายัก และเดินทางสะดวกจากแหลมบาลีฮาย',
                'image' => '/assets/img/tourism/koh-larn.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B9%80%E0%B8%81%E0%B8%B2%E0%B8%B0%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99',
            ],
            [
                'name' => 'วัดพระแก้ว, กรุงเทพฯ',
                'description' => 'วัดสำคัญกลางกรุง สถาปัตยกรรมงดงาม พระแก้วมรกต และพระบรมมหาราชวัง',
                'image' => '/assets/img/tourism/wat-phra-kaew.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B8%A7%E0%B8%B1%E0%B8%94%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7',
            ],
            [
                'name' => 'อุทยานแห่งชาติดอยอินทนนท์, เชียงใหม่',
                'description' => 'ยอดเขาสูงสุดของไทย อากาศเย็นตลอดปี น้ำตกสวย จุดชมวิวทะเลหมอก',
                'image' => '/assets/img/tourism/inthanon.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B8%AD%E0%B8%B8%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%99%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%87%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4%E0%B8%94%E0%B8%AD%E0%B8%A2%E0%B8%AD%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%99%E0%B8%99%E0%B8%97%E0%B9%8C',
            ],
            [
                'name' => 'น้ำตกทีลอซู, ตาก',
                'description' => 'น้ำตกขนาดใหญ่กลางป่า อุดมสมบูรณ์ เหมาะกับการเดินป่าและแคมป์ปิ้ง',
                'image' => '/assets/img/tourism/tee-lor-su.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B8%99%E0%B9%89%E0%B8%B3%E0%B8%95%E0%B8%81%E0%B8%97%E0%B8%B5%E0%B8%A5%E0%B8%AD%E0%B8%8B%E0%B8%B9',
            ],
            [
                'name' => 'เขาสก, สุราษฎร์ธานี',
                'description' => 'อุทยานแห่งชาติที่มีเขื่อนเชี่ยวหลาน ทะเลสาบสีเขียวมรกต และภูเขาหินปูน',
                'image' => '/assets/img/tourism/khao-sok.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B9%80%E0%B8%82%E0%B8%B2%E0%B8%AA%E0%B8%81',
            ],
        ];

        foreach ($places as $place) {
            \App\Models\TourismPlace::create($place);
        }
    }
}
