<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ สร้าง Role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // 2️⃣ สร้าง Permission
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users']);
        $editPosts   = Permission::firstOrCreate(['name' => 'edit posts']);

        // 3️⃣ ผูก Permission เข้ากับ Role
        $adminRole->givePermissionTo([$manageUsers, $editPosts]);
        $userRole->givePermissionTo([$editPosts]);

        // 4️⃣ สร้าง Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'is_active' => true,
            ]
        );
        $admin->assignRole($adminRole);

        // 5️⃣ สร้าง User ธรรมดา
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'password' => Hash::make('password123'),
                'is_active' => true,
            ]
        );
        $user->assignRole($userRole);

        // 6️⃣ Seed content data (10 items each with image, date, and link)
        $this->call([
            NewsSeeder::class,
            TourismNewsSeeder::class,
            TourismPlaceSeeder::class,
        ]);
    }
}
