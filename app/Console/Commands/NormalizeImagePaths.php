<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TourismPlace;
use App\Models\News;
use App\Models\TourismNews;

class NormalizeImagePaths extends Command
{
    protected $signature = 'images:normalize-paths';
    protected $description = 'Normalize image paths for News, TourismNews, and TourismPlace to valid public URLs';

    public function handle(): int
    {
        $updated = 0;

        // Helper closure to resolve a file name to a public URL path
        $resolvePath = function (?string $value, array $preferredDirs = ['tourism', 'news']) {
            if (empty($value)) return null;

            // Already absolute URL or site path
            if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://') || str_starts_with($value, '/')) {
                return $value;
            }

            $basename = ltrim($value, '/');
            foreach ($preferredDirs as $dir) {
                $candidate = public_path("assets/img/{$dir}/{$basename}");
                if (file_exists($candidate)) {
                    return "/assets/img/{$dir}/{$basename}";
                }
            }
            // Fallback to tourism directory
            return "/assets/img/tourism/{$basename}";
        };

        // TourismPlace
        TourismPlace::chunk(200, function ($chunk) use (&$updated, $resolvePath) {
            foreach ($chunk as $place) {
                $normalized = $resolvePath($place->image, ['tourism']);
                if ($normalized && $normalized !== $place->image) {
                    $place->image = $normalized;
                    $place->save();
                    $updated++;
                }
            }
        });

        // News
        News::chunk(200, function ($chunk) use (&$updated, $resolvePath) {
            foreach ($chunk as $item) {
                $normalized = $resolvePath($item->image, ['news', 'tourism']);
                if ($normalized && $normalized !== $item->image) {
                    $item->image = $normalized;
                    $item->save();
                    $updated++;
                }
            }
        });

        // TourismNews
        if (class_exists(TourismNews::class)) {
            TourismNews::chunk(200, function ($chunk) use (&$updated, $resolvePath) {
                foreach ($chunk as $item) {
                    $normalized = $resolvePath($item->image, ['news', 'tourism']);
                    if ($normalized && $normalized !== $item->image) {
                        $item->image = $normalized;
                        $item->save();
                        $updated++;
                    }
                }
            });
        }

        $this->info("Normalized image paths updated: {$updated}");
        return Command::SUCCESS;
    }
}
