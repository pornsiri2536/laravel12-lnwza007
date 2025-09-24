<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;

class AddKohLarnPlaceSeeder extends Seeder
{
    public function run(): void
    {
        TourismPlace::firstOrCreate(
            ['name' => 'เกาะล้าน, ชลบุรี'],
            [
                'description' => 'เกาะสวยใกล้พัทยา น้ำทะเลใส หาดทรายขาว กิจกรรมดำน้ำตื้น พายเรือคายัก และเดินทางสะดวกจากแหลมบาลีฮาย',
                // ใส่พาธรูปภายในโปรเจกต์ หรือเปลี่ยนเป็น URL ภายนอกได้
                'image' => '/assets/img/tourism/koh-larn.jpg',
                'link' => 'https://www.tourismthailand.org/Attraction/%E0%B9%80%E0%B8%81%E0%B8%B2%E0%B8%B0%E0%B8%A5%E0%B9%89%E0%B8%B2%E0%B8%99',
            ]
        );
    }
}
