<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class TourismController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากตาราง news
        $news = News::orderBy('published_at', 'desc')->get();
        return view('tourism.index', compact('news'));
    }

    public function show($id)
    {
        // ดึงข้อมูล 1 รายการจากตาราง news
        $newsItem = News::findOrFail($id);
        return view('tourism.show', compact('newsItem'));
    }
}
