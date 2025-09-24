<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NormalizeImagePathsSeeder extends Seeder
{
    public function run(): void
    {
        // Tourism Places
        $places = DB::table('tourism_places')->get();
        foreach ($places as $p) {
            $img = $p->image;
            if (!empty($img) && !str_starts_with($img, 'http') && !str_starts_with($img, '/')) {
                DB::table('tourism_places')->where('id', $p->id)->update([
                    'image' => '/assets/img/tourism/' . ltrim($img, '/'),
                ]);
            }
        }

        // News
        $news = DB::table('news')->get();
        foreach ($news as $n) {
            $img = $n->image;
            if (!empty($img) && !str_starts_with($img, 'http') && !str_starts_with($img, '/')) {
                // Try news folder first, then tourism
                $candidateNews = public_path('assets/img/news/' . ltrim($img, '/'));
                $path = file_exists($candidateNews)
                    ? '/assets/img/news/' . ltrim($img, '/')
                    : '/assets/img/tourism/' . ltrim($img, '/');
                DB::table('news')->where('id', $n->id)->update(['image' => $path]);
            }
        }

        // Tourism News
        if (Schema::hasTable('tourism_news')) {
            $tnews = DB::table('tourism_news')->get();
            foreach ($tnews as $tn) {
                $img = $tn->image;
                if (!empty($img) && !str_starts_with($img, 'http') && !str_starts_with($img, '/')) {
                    $candidateNews = public_path('assets/img/news/' . ltrim($img, '/'));
                    $path = file_exists($candidateNews)
                        ? '/assets/img/news/' . ltrim($img, '/')
                        : '/assets/img/tourism/' . ltrim($img, '/');
                    DB::table('tourism_news')->where('id', $tn->id)->update(['image' => $path]);
                }
            }
        }
    }
}
