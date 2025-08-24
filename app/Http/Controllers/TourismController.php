<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\News;

class TourismController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $news = News::orderBy('published_at', 'desc')->get();

        return view('tourism.index', compact('places', 'news'));
    }
}
