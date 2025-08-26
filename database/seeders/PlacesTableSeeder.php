<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('places')->insert([
            [
                'name' => 'วัดโบสถ์',
                'description' => 'วัดเก่าแก่ริมแม่น้ำเจ้าพระยา',
                'image' => 'https://pathumpao.go.th/wp-content/uploads/2024/07/17.5-pics_12261_5_thumbnail.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ตลาดน้ำคลอง',
                'description' => 'ตลาดน้ำชื่อดัง มีอาหารและสินค้าท้องถิ่น',
                'image' => 'market.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'พิพิธภัณฑ์เมือง',
                'description' => 'แหล่งเรียนรู้ทางวัฒนธรรมและประวัติศาสตร์',
                'image' => 'museum.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
