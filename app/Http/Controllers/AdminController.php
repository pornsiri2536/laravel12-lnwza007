<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // คุณสามารถเปลี่ยนเป็น return view(...) ได้ตามต้องการ
        return response('Admin Dashboard', 200);
    }

    public function home()
    {
        return response('Admin Home Page', 200);
    }

    public function contentManagement()
    {
        return response('Content Management Page', 200);
    }

    public function settings()
    {
        return response('Settings Page', 200);
    }
}

