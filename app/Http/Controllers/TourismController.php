<?php

namespace App\Http\Controllers;

use App\Models\TourismPlace;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    // แสดงหน้ารวมสถานที่ท่องเที่ยว
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $places = TourismPlace::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('tourism.index', compact('places', 'q'));
    }

    // แสดงรายละเอียดสถานที่ท่องเที่ยวทีละแห่ง
    public function show($id)
    {
        $place = TourismPlace::findOrFail($id);
        return view('tourism.show', compact('place'));
    }
}