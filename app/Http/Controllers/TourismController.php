<?php

namespace App\Http\Controllers;

use App\Models\TourismPlace;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    // แสดงหน้ารวมสถานที่ท่องเที่ยว
    public function index()
    {
        $places = TourismPlace::all();
        return view('tourism.index', compact('places'));
    }

    // แสดงรายละเอียดสถานที่ท่องเที่ยวทีละแห่ง
    public function show($id)
    {
        $place = TourismPlace::findOrFail($id);
        return view('tourism.show', compact('place'));
    }
}
