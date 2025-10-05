<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourismPlace;

class TourismPlaceController extends Controller
{
    /**
     * แสดงรายการสถานที่ท่องเที่ยวทั้งหมด
     */
    public function index()
    {
        // ดึงข้อมูลจากตาราง tourism_places
        $places = TourismPlace::latest()->paginate(10);

        // ส่งไปยัง view: resources/views/tourism/index.blade.php
        return view('tourism.index', compact('places'));
    }

    /**
     * แสดงรายละเอียดสถานที่ท่องเที่ยว
     */
    public function show($id)
    {
        // หา record ตาม id (ถ้าไม่เจอจะ error 404)
        $place = TourismPlace::findOrFail($id);

        // ส่งไปยัง view: resources/views/tourism/show.blade.php
        return view('tourism.show', compact('place'));
    }
}
