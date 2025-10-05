<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSettingsController extends Controller
{
    public function save(Request $request)
    {
        // save settings logic
        return redirect()->route('admin.dashboard')->with('success', 'Dashboard settings saved');
    }
}
