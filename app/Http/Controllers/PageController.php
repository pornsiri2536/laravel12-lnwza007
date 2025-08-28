<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about'); // โหลดไฟล์ resources/views/about.blade.php
    }
}
