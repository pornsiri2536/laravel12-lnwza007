<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ สร้าง role admin ถ้ายังไม่มี
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // 2️⃣ สร้าง user admin ถ้ายังไม่มี
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // เปลี่ยนได้ตามต้องการ
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // 3️⃣ กำหนด role ให้ user admin
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole($adminRole);
        }
    }
}
