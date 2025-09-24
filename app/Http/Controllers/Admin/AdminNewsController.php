<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q');
        $items = News::query()
            ->when($q, function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(15);
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image' => ['nullable','string','max:1024'], // optional URL/path
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);

        // If uploaded file present, store and override image path
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $data['image'] = '/storage/' . $path; // e.g. /storage/news/xxx.jpg
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('status','สร้างข่าวเรียบร้อย');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', ['item' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image' => ['nullable','string','max:1024'],
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('status','อัปเดตข่าวเรียบร้อย');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('status','ลบข่าวเรียบร้อย');
    }
}
