<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::create([
            'title' => 'Laravel 11 Released!',
            'content' => 'Laravel 11 มาพร้อมฟีเจอร์ใหม่และประสิทธิภาพที่ดีขึ้นอย่างมาก'
        ]);

        News::create([
            'title' => 'PHP 8.3 Features',
            'content' => 'PHP 8.3 มาพร้อมฟีเจอร์ใหม่ เช่น readonly classes และ performance ที่ดีขึ้น'
        ]);
    }
}
