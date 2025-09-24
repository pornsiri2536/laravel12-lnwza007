<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $permissions = Permission::where('is_active', true)->get()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        DB::transaction(function () use ($request) {
            $role = Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);

            if ($request->has('permissions')) {
                $role->permissions()->sync($request->permissions);
            }
        });

        return redirect()->route('admin.roles.index')
            ->with('success', 'สร้าง Role เรียบร้อยแล้ว');
    }

    /**
     * Display the specified role.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the role.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::where('is_active', true)->get()->groupBy('group');
        $role->load('permissions');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        DB::transaction(function () use ($request, $role) {
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);

            if ($request->has('permissions')) {
                $role->permissions()->sync($request->permissions);
            } else {
                $role->permissions()->detach();
            }
        });

        return redirect()->route('admin.roles.index')
            ->with('success', 'อัปเดต Role เรียบร้อยแล้ว');
    }

    /**
     * Remove the specified role.
     */
    public function destroy(Role $role)
    {
        // ตรวจสอบว่า role นี้มี user ใช้งานอยู่หรือไม่
        if ($role->users()->count() > 0) {
            return redirect()->route('admin.roles.index')
                ->with('error', 'ไม่สามารถลบ Role นี้ได้ เนื่องจากมีผู้ใช้งานอยู่');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'ลบ Role เรียบร้อยแล้ว');
    }

    /**
     * Toggle role status.
     */
    public function toggleStatus(Role $role)
    {
        $role->update(['is_active' => !$role->is_active]);

        $status = $role->is_active ? 'เปิดใช้งาน' : 'ปิดใช้งาน';
        return redirect()->route('admin.roles.index')
            ->with('success', "{$status} Role เรียบร้อยแล้ว");
    }
}
