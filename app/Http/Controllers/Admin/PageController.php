<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.pages.index')->with('success', 'Page created');
    }

    public function edit($id)
    {
        return view('admin.pages.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.pages.index')->with('success', 'Page updated');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted');
    }
}
