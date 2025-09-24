<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // หา Super Admin role
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::where('name', 'admin')->first();

        if (!$superAdminRole || !$adminRole) {
            $this->command->error('Roles not found. Please run RolePermissionSeeder first.');
            return;
        }

        // สร้าง Admin คนที่ 2
        $admin2 = User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole->id,
        ]);

        // กำหนด Role เพิ่มเติม
        $admin2->assignRole($adminRole);

        // สร้าง Admin คนที่ 3 (Super Admin)
        $superAdmin2 = User::create([
            'name' => 'Super Admin 2',
            'email' => 'superadmin2@example.com',
            'password' => Hash::make('super123'),
            'role_id' => $superAdminRole->id,
        ]);

        // กำหนด Role เพิ่มเติม
        $superAdmin2->assignRole($superAdminRole);

        // สร้าง Editor
        $editorRole = Role::where('name', 'editor')->first();
        if ($editorRole) {
            $editor = User::create([
                'name' => 'Editor 1',
                'email' => 'editor@example.com',
                'password' => Hash::make('editor123'),
                'role_id' => $editorRole->id,
            ]);

            $editor->assignRole($editorRole);
        }

        // สร้าง Author
        $authorRole = Role::where('name', 'author')->first();
        if ($authorRole) {
            $author = User::create([
                'name' => 'Author 1',
                'email' => 'author@example.com',
                'password' => Hash::make('author123'),
                'role_id' => $authorRole->id,
            ]);

            $author->assignRole($authorRole);
        }

        $this->command->info('Admin users created successfully!');
        $this->command->info('Admin 2: admin2@example.com / admin123');
        $this->command->info('Super Admin 2: superadmin2@example.com / super123');
        $this->command->info('Editor: editor@example.com / editor123');
        $this->command->info('Author: author@example.com / author123');
    }
}
