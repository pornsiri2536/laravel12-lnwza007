<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\TourismNews;
use App\Models\TourismPlace;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'news' => News::count(),
            'tourism_news' => TourismNews::count(),
            'tourism_places' => TourismPlace::count(),
        ];

        $recent_news = News::latest()->take(5)->get();
        $recent_tourism_news = TourismNews::with('eventDates')->latest()->take(5)->get();
        $recent_places = TourismPlace::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_news', 'recent_tourism_news', 'recent_places'));
    }

    /**
     * Display content management page.
     */
    public function contentManagement()
    {
        return view('admin.content-management');
    }

    /**
     * Display user management page.
     */
    public function userManagement()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.user-management', compact('users'));
    }

    /**
     * Display role management page.
     */
    public function roleManagement()
    {
        return view('admin.role-management');
    }

    /**
     * Display permission management page.
     */
    public function permissionManagement()
    {
        return view('admin.permission-management');
    }

    /**
     * Display settings page.
     */
    public function settings()
    {
        return view('admin.settings');
    }
}
