<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourismPlace;
use Illuminate\Support\Str;

class BulkTourismPlacesFromImagesSeeder extends Seeder
{
    public function run(): void
    {
        $basePath = public_path('assets/img/tourism');
        if (!is_dir($basePath)) {
            $this->command?->warn("Directory not found: {$basePath}");
            return;
        }

        $files = array_values(array_filter(scandir($basePath), function ($f) use ($basePath) {
            return is_file($basePath . DIRECTORY_SEPARATOR . $f)
                && !str_starts_with($f, '.')
                && preg_match('/\.(jpg|jpeg|png|webp)$/i', $f);
        }));

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            // แปลงชื่อไฟล์ให้เป็นชื่อสถานที่อ่านง่าย (แทนขีด/ขีดล่างด้วยเว้นวรรค)
            $prettyName = trim(preg_replace('/[_-]+/', ' ', $name));

            TourismPlace::firstOrCreate(
                ['image' => '/assets/img/tourism/' . $file],
                [
                    'name' => $prettyName,
                    'description' => 'แหล่งท่องเที่ยวที่น่าสนใจ: ' . $prettyName . ' — เพิ่มคำอธิบายรายละเอียดได้ภายหลัง',
                    'link' => null,
                ]
            );
        }

        $this->command?->info('Bulk tourism places created/updated from images.');
    }
}
