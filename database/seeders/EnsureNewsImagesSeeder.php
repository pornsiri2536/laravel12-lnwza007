<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnsureNewsImagesSeeder extends Seeder
{
    public function run(): void
    {
        $public = public_path('assets/img');
        $newsDir = $public . DIRECTORY_SEPARATOR . 'news';
        $tourDir = $public . DIRECTORY_SEPARATOR . 'tourism';
        if (!is_dir($newsDir)) {
            @mkdir($newsDir, 0777, true);
        }

        $copyIfNeeded = function (string $filename) use ($newsDir, $tourDir) {
            $basename = ltrim($filename, '/');
            $basename = basename($basename);
            $newsPath = $newsDir . DIRECTORY_SEPARATOR . $basename;
            if (file_exists($newsPath)) {
                return '/assets/img/news/' . $basename;
            }
            $tourismPath = $tourDir . DIRECTORY_SEPARATOR . $basename;
            if (file_exists($tourismPath)) {
                @copy($tourismPath, $newsPath);
                return '/assets/img/news/' . $basename;
            }
            // If neither exists, keep original string; frontend has fallback
            return null;
        };

        // news table
        $newsRows = DB::table('news')->get();
        foreach ($newsRows as $row) {
            $img = $row->image ?? '';
            $basename = $img;
            if (empty($basename)) continue;
            // If already absolute url or begins with /assets/img/news, skip
            if (str_starts_with($basename, 'http') || str_starts_with($basename, '/assets/img/news/')) continue;
            $newPath = $copyIfNeeded($basename);
            if ($newPath) {
                DB::table('news')->where('id', $row->id)->update(['image' => $newPath]);
            }
        }

        // tourism_news table
        if (\Schema::hasTable('tourism_news')) {
            $tnewsRows = DB::table('tourism_news')->get();
            foreach ($tnewsRows as $row) {
                $img = $row->image ?? '';
                $basename = $img;
                if (empty($basename)) continue;
                if (str_starts_with($basename, 'http') || str_starts_with($basename, '/assets/img/news/')) continue;
                $newPath = $copyIfNeeded($basename);
                if ($newPath) {
                    DB::table('tourism_news')->where('id', $row->id)->update(['image' => $newPath]);
                }
            }
        }
    }
}
