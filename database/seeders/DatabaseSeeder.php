<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // สร้าง User ตัวอย่าง
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // เรียก Seeder อื่น ๆ
        $this->call([
            NewsSeeder::class,
            TourismNewsSeeder::class,
            TourismPlaceSeeder::class,
        ]);
    }
}
