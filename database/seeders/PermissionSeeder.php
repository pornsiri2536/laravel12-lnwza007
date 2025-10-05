<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // กำหนดสิทธิ์เบื้องต้น
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
        ];

        // บันทึก permissions ลงฐานข้อมูล
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // สร้าง role "admin" ถ้ายังไม่มี
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            [
                'display_name' => 'Administrator',
                'description'  => 'Full access to all features',
                'is_active'    => true,
            ]
        );

        // ให้ admin มีทุก permission
        $admin->permissions()->sync(Permission::pluck('id')->toArray());
    }
}
