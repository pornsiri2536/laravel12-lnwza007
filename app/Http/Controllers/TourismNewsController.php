<?php

namespace App\Http\Controllers;

use App\Models\TourismNews;
use Illuminate\Http\Request;

class TourismNewsController extends Controller
{
    public function index()
    {
        $tourismNews = TourismNews::with('eventDates')->latest()->paginate(10);
        return view('tourism-news', compact('tourismNews'));
    }

    public function show($id)
    {
        $news = TourismNews::with('eventDates')->findOrFail($id);
        return view('tourism-news-show', compact('news'));
    }
}
