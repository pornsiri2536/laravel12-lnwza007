<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<p>นี่คือหน้าข้อมูลเกี่ยวกับเรา</p>',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => '<p>ติดต่อเราที่ 123-456-789</p>',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
