<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $item = News::findOrFail($id);
        return view('news.show', compact('item'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        News::create($request->all());
        return redirect()->route('news.index')->with('success', 'News added successfully');
    }

    public function edit($id)
    {
        $item = News::findOrFail($id);
        return view('news.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = News::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
