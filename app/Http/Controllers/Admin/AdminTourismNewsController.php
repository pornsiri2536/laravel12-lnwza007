<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourismNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTourismNewsController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q');
        $items = TourismNews::query()
            ->when($q, function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(15);
        return view('admin.tourism_news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.tourism_news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image' => ['nullable','string','max:1024'],
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('tourism_news', 'public');
            $data['image'] = '/storage/' . $path;
        }
        TourismNews::create($data);
        return redirect()->route('admin.tourism_news.index')->with('status','สร้างข่าวท่องเที่ยวเรียบร้อย');
    }

    public function edit(TourismNews $tourism_news)
    {
        return view('admin.tourism_news.edit', ['item' => $tourism_news]);
    }

    public function update(Request $request, TourismNews $tourism_news)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image' => ['nullable','string','max:1024'],
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('tourism_news', 'public');
            $data['image'] = '/storage/' . $path;
        }
        $tourism_news->update($data);
        return redirect()->route('admin.tourism_news.index')->with('status','อัปเดตข่าวท่องเที่ยวเรียบร้อย');
    }

    public function destroy(TourismNews $tourism_news)
    {
        $tourism_news->delete();
        return redirect()->route('admin.tourism_news.index')->with('status','ลบข่าวท่องเที่ยวเรียบร้อย');
    }
}
