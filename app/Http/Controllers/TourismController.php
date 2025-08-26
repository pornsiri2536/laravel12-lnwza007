<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourism;
use App\Models\TourismNews;

class TourismController extends Controller
{
    // แสดงรายการสถานที่ทั้งหมด
    public function index()
    {
        $tourisms = TourismNews::all();
        return view('tourism.index', compact('tourisms'));
    }

    // แสดงฟอร์มเพิ่มข้อมูลใหม่
    public function create()
    {
        return view('tourism.create');
    }

    // บันทึกข้อมูลใหม่ลง DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        TourismNews::create($request->all());

        return redirect()->route('tourism.index')
                         ->with('success', 'เพิ่มข้อมูลสถานที่สำเร็จแล้ว');
    }

    // App\Http\Controllers\TourismController.php
    public function show($id)
    {
        $tourism = TourismNews::findOrFail($id);
        return view('tourism.show', compact('tourism'));
    }

    }

