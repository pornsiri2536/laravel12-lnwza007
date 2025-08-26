<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.show', compact('newsItem'));
    }
}
