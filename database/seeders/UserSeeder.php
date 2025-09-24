<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // สร้าง role admin ถ้ายังไม่มี
        $role = Role::firstOrCreate(['name' => 'admin']);

        // สร้าง user ตัวอย่าง
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'), // เปลี่ยนรหัสผ่านได้
            ]
        );

        // Assign role ให้ user
        $user->assignRole($role);
    }
}
