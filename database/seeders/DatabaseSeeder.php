<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 5️⃣ สร้าง User ธรรมดา
        $user = User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // 6️⃣ Seed content data (news, tourism news, places)
        $this->call([
            NewsSeeder::class,
            TourismNewsSeeder::class,
            BulkTourismPlacesFromImagesSeeder::class, // อ่านภาพจาก public/assets/img/tourism
            AddKohLarnPlaceSeeder::class,            // เพิ่มตัวอย่างสถานที่
        ]);

        // 7️⃣ Normalize/Ensure image paths after seeding data เพื่อให้ path รูปอยู่ในรูปแบบที่ frontend ใช้งานได้
        $this->call([
            NormalizeImagePathsSeeder::class,
            EnsureNewsImagesSeeder::class,
        ]);
    }
}

