<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Role created');
    }

    public function edit($id)
    {
        return view('admin.roles.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Role updated');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted');
    }

    public function toggleStatus($id)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Role status toggled');
    }
}
