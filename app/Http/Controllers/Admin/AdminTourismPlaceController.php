<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourismPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTourismPlaceController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q');
        $items = TourismPlace::query()
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(15);
        return view('admin.tourism_places.index', compact('items'));
    }

    public function create()
    {
        return view('admin.tourism_places.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'image' => ['nullable','string','max:1024'],
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('tourism_places', 'public');
            $data['image'] = '/storage/' . $path;
        }
        TourismPlace::create($data);
        return redirect()->route('admin.tourism_places.index')->with('status','สร้างสถานที่ท่องเที่ยวเรียบร้อย');
    }

    public function edit(TourismPlace $tourism_place)
    {
        return view('admin.tourism_places.edit', ['item' => $tourism_place]);
    }

    public function update(Request $request, TourismPlace $tourism_place)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'image' => ['nullable','string','max:1024'],
            'image_file' => ['nullable','image','mimes:jpeg,jpg,png,webp,gif','max:4096'],
            'link' => ['nullable','url','max:1024'],
        ]);
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('tourism_places', 'public');
            $data['image'] = '/storage/' . $path;
        }
        $tourism_place->update($data);
        return redirect()->route('admin.tourism_places.index')->with('status','อัปเดตสถานที่ท่องเที่ยวเรียบร้อย');
    }

    public function destroy(TourismPlace $tourism_place)
    {
        $tourism_place->delete();
        return redirect()->route('admin.tourism_places.index')->with('status','ลบสถานที่ท่องเที่ยวเรียบร้อย');
    }
}
