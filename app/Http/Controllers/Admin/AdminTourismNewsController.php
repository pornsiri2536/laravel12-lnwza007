<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTourismNewsController extends Controller
{
    public function index()
    {
        return view('admin.tourism-news.index');
    }

    public function create()
    {
        return view('admin.tourism-news.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.tourism-news.index')->with('success', 'Tourism news created');
    }

    public function edit($id)
    {
        return view('admin.tourism-news.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.tourism-news.index')->with('success', 'Tourism news updated');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.tourism-news.index')->with('success', 'Tourism news deleted');
    }
}
