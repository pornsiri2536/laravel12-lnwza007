<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // validate & save news
        return redirect()->route('admin.news.index')->with('success', 'News created successfully');
    }

    public function edit($id)
    {
        return view('admin.news.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // update news
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        // delete news
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
}
