<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q');
        $users = User::query()
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(15);
        return view('admin.user_mgmt.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user_mgmt.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:6','max:255'],
            'is_active' => ['nullable','boolean'],
        ]);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->is_active = $request->boolean('is_active', true);
        $user->save();
        return redirect()->route('admin.user_mgmt.index')->with('status','สร้างผู้ใช้งานเรียบร้อย');
    }

    public function edit(User $user_mgmt)
    {
        $user = $user_mgmt;
        return view('admin.user_mgmt.edit', compact('user'));
    }

    public function update(Request $request, User $user_mgmt)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email,'.$user_mgmt->id],
            'password' => ['nullable','string','min:6','max:255'],
            'is_active' => ['nullable','boolean'],
        ]);
        $user = $user_mgmt;
        $user->name = $data['name'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->is_active = $request->boolean('is_active', true);
        $user->save();
        return redirect()->route('admin.user_mgmt.index')->with('status','อัปเดตผู้ใช้งานเรียบร้อย');
    }

    public function destroy(User $user_mgmt)
    {
        $user = $user_mgmt;
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error','ไม่สามารถลบผู้ใช้งานที่กำลังใช้งานอยู่');
        }
        $user->delete();
        return redirect()->route('admin.user_mgmt.index')->with('status','ลบผู้ใช้งานเรียบร้อย');
    }

    public function toggleStatus(User $user_mgmt)
    {
        $user = $user_mgmt;
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error','ไม่สามารถเปลี่ยนสถานะของผู้ใช้งานที่กำลังใช้งานอยู่');
        }
        $user->is_active = ! (bool) ($user->is_active ?? true);
        $user->save();
        return redirect()->back()->with('status','เปลี่ยนสถานะผู้ใช้งานเรียบร้อย');
    }
}
