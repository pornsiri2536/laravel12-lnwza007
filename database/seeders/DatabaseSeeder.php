<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // สร้าง User ธรรมดา
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Seed ข้อมูลเนื้อหา
        $this->call([
            NewsSeeder::class,
            TourismNewsSeeder::class,
            TourismPlaceSeeder::class,
            PageSeeder::class, // ✅ เพิ่ม PageSeeder เข้ามา
        ]);
    }
}
