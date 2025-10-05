<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTourismPlaceController extends Controller
{
    public function index()
    {
        return view('admin.tourism-places.index');
    }

    public function create()
    {
        return view('admin.tourism-places.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.tourism-places.index')->with('success', 'Tourism place created');
    }

    public function edit($id)
    {
        return view('admin.tourism-places.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.tourism-places.index')->with('success', 'Tourism place updated');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.tourism-places.index')->with('success', 'Tourism place deleted');
    }
}
