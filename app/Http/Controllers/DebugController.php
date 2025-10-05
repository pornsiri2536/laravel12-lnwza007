<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DebugController extends Controller
{
    public function loginCheck()
    {
        return response()->json([
            'logged_in' => Auth::check(),
            'user' => Auth::user(),
        ]);
    }

    public function loginAsAdmin()
    {
        $admin = User::where('is_admin', 1)->first();
        if ($admin) {
            Auth::login($admin);
            return "Logged in as admin: " . $admin->name;
        }
        return "No admin user found.";
    }

    public function listUsers()
    {
        return User::all();
    }

    public function setAdminPassword(Request $request)
    {
        $admin = User::where('is_admin', 1)->first();
        if ($admin) {
            $admin->password = bcrypt('admin123'); // ตั้งรหัสใหม่
            $admin->save();
            return "Admin password reset.";
        }
        return "No admin found.";
    }

    public function dbInfo()
    {
        return DB::select("SELECT now() as time, database() as db, user() as user");
    }
}
