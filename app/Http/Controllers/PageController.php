<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page; // ถ้าคุณมี Model Page ใน DB

class PageController extends Controller
{
    /**
     * แสดงหน้าตาม slug
     */
    public function show($slug)
    {
        // หา Page จาก database ตาม slug
        $page = Page::where('slug', $slug)->firstOrFail();

        // ส่งไปยัง view เช่น resources/views/pages/show.blade.php
        return view('pages.show', compact('page'));
    }
}
