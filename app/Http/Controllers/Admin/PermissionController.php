<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     */
    public function index()
    {
        $permissions = Permission::paginate(15);
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created permission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group' => 'nullable|string|max:255',
        ]);

        Permission::create($request->all());

        return redirect()->route('admin.permissions.index')
            ->with('success', 'สร้าง Permission เรียบร้อยแล้ว');
    }

    /**
     * Display the specified permission.
     */
    public function show(Permission $permission)
    {
        $permission->load('roles');
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the permission.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'group' => 'nullable|string|max:255',
        ]);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.index')
            ->with('success', 'อัปเดต Permission เรียบร้อยแล้ว');
    }

    /**
     * Remove the specified permission.
     */
    public function destroy(Permission $permission)
    {
        // ตรวจสอบว่า permission นี้มี role ใช้งานอยู่หรือไม่
        if ($permission->roles()->count() > 0) {
            return redirect()->route('admin.permissions.index')
                ->with('error', 'ไม่สามารถลบ Permission นี้ได้ เนื่องจากมี Role ใช้งานอยู่');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'ลบ Permission เรียบร้อยแล้ว');
    }

    /**
     * Toggle permission status.
     */
    public function toggleStatus(Permission $permission)
    {
        $permission->update(['is_active' => !$permission->is_active]);

        $status = $permission->is_active ? 'เปิดใช้งาน' : 'ปิดใช้งาน';
        return redirect()->route('admin.permissions.index')
            ->with('success', "{$status} Permission เรียบร้อยแล้ว");
    }
}
