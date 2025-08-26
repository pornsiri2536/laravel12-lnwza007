<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'งานเทศกาลท่องเที่ยวประจำปี',
                'content' => 'จังหวัดปทุมธานีจัดงานท่องเที่ยวสุดยิ่งใหญ่...',
                'image' => 'festival.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'เปิดตลาดน้ำใหม่',
                'content' => 'ตลาดน้ำแห่งใหม่เปิดให้บริการแล้ว...',
                'image' => 'floating_market.jpg',
                'published_at' => now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
