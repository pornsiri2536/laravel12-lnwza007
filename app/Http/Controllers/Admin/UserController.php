<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * แสดงรายชื่อผู้ใช้งาน
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * ฟอร์มสร้างผู้ใช้งานใหม่
     */
    public function create()
    {
        // ใช้ name เป็น key และ value
        $roles = Role::pluck('name', 'name');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * บันทึกผู้ใช้งานใหม่
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'nullable|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_active'=> true,
        ]);

        // กำหนด role (default = user)
        if ($request->filled('role')) {
            $user->assignRole($request->role);
        } else {
            $user->assignRole('user');
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'สร้างผู้ใช้งานเรียบร้อยแล้ว');
    }

    /**
     * แสดงรายละเอียดผู้ใช้งาน
     */
    public function show(User $user)
    {
        $user->load(['roles', 'permissions']);
        return view('admin.users.show', compact('user'));
    }

    /**
     * ฟอร์มแก้ไขผู้ใช้งาน
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name');
        $user->load(['roles']);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * อัปเดตข้อมูลผู้ใช้งาน
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role'     => 'nullable|exists:roles,name',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // sync role ใหม่ (default = user ถ้าไม่ได้เลือก)
        if ($request->filled('role')) {
            $user->syncRoles([$request->role]);
        } else {
            $user->syncRoles(['user']);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'อัปเดตผู้ใช้งานเรียบร้อยแล้ว');
    }

    /**
     * ลบผู้ใช้งาน
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'ไม่สามารถลบบัญชีตัวเองได้');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'ลบผู้ใช้งานเรียบร้อยแล้ว');
    }

    /**
     * เปิด/ปิดการใช้งาน
     */
    public function toggleStatus(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'ไม่สามารถปิดใช้งานตัวเองได้');
        }

        $user->update(['is_active' => !$user->is_active]);

        $status = $user->is_active ? 'เปิดใช้งาน' : 'ปิดใช้งาน';
        return redirect()->route('admin.users.index')
            ->with('success', "{$status} ผู้ใช้งานเรียบร้อยแล้ว");
    }

    /**
     * กำหนด Role เพิ่มเติมให้ผู้ใช้งาน
     */
    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->assignRole($request->role);

        return redirect()->back()
            ->with('success', 'กำหนด Role ให้ผู้ใช้งานเรียบร้อยแล้ว');
    }

    /**
     * ลบ Role ออกจากผู้ใช้งาน
     */
    public function removeRole(User $user, Role $role)
    {
        $user->removeRole($role);

        return redirect()->back()
            ->with('success', 'ลบ Role จากผู้ใช้งานเรียบร้อยแล้ว');
    }
}
