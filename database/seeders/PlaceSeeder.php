<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    public function run(): void
    {
        Place::create([
            'name' => 'วัดโบสถ์',
            'description' => 'วัดโบราณริมแม่น้ำเจ้าพระยา บรรยากาศร่มรื่น',
            'image' => null // เพิ่มชื่อไฟล์ถ้ามีภาพ เช่น 'places/watbote.jpg'
        ]);

        Place::create([
            'name' => 'ตลาดน้ำคลองสี่',
            'description' => 'ตลาดน้ำชื่อดังของปทุมธานี มีอาหารพื้นบ้านและของฝากมากมาย',
            'image' => null
        ]);

        Place::create([
            'name' => 'พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ',
            'description' => 'แหล่งเรียนรู้ด้านวิทยาศาสตร์และเทคโนโลยีที่ใหญ่ที่สุดในประเทศ',
            'image' => null
        ]);
    }
}
