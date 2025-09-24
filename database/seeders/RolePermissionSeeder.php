<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // สร้าง Permissions
        $permissions = [
            // User Management
            ['name' => 'user.view', 'display_name' => 'ดูข้อมูลผู้ใช้งาน', 'group' => 'users'],
            ['name' => 'user.create', 'display_name' => 'สร้างผู้ใช้งาน', 'group' => 'users'],
            ['name' => 'user.edit', 'display_name' => 'แก้ไขผู้ใช้งาน', 'group' => 'users'],
            ['name' => 'user.delete', 'display_name' => 'ลบผู้ใช้งาน', 'group' => 'users'],
            
            // Role Management
            ['name' => 'role.view', 'display_name' => 'ดูข้อมูล Role', 'group' => 'roles'],
            ['name' => 'role.create', 'display_name' => 'สร้าง Role', 'group' => 'roles'],
            ['name' => 'role.edit', 'display_name' => 'แก้ไข Role', 'group' => 'roles'],
            ['name' => 'role.delete', 'display_name' => 'ลบ Role', 'group' => 'roles'],
            
            // Permission Management
            ['name' => 'permission.view', 'display_name' => 'ดูข้อมูล Permission', 'group' => 'permissions'],
            ['name' => 'permission.create', 'display_name' => 'สร้าง Permission', 'group' => 'permissions'],
            ['name' => 'permission.edit', 'display_name' => 'แก้ไข Permission', 'group' => 'permissions'],
            ['name' => 'permission.delete', 'display_name' => 'ลบ Permission', 'group' => 'permissions'],
            
            // News Management
            ['name' => 'news.view', 'display_name' => 'ดูข้อมูลข่าว', 'group' => 'news'],
            ['name' => 'news.create', 'display_name' => 'สร้างข่าว', 'group' => 'news'],
            ['name' => 'news.edit', 'display_name' => 'แก้ไขข่าว', 'group' => 'news'],
            ['name' => 'news.delete', 'display_name' => 'ลบข่าว', 'group' => 'news'],
            ['name' => 'news.manage', 'display_name' => 'จัดการข่าว', 'group' => 'news'],
            
            // Tourism Management
            ['name' => 'tourism.view', 'display_name' => 'ดูข้อมูลท่องเที่ยว', 'group' => 'tourism'],
            ['name' => 'tourism.create', 'display_name' => 'สร้างข้อมูลท่องเที่ยว', 'group' => 'tourism'],
            ['name' => 'tourism.edit', 'display_name' => 'แก้ไขข้อมูลท่องเที่ยว', 'group' => 'tourism'],
            ['name' => 'tourism.delete', 'display_name' => 'ลบข้อมูลท่องเที่ยว', 'group' => 'tourism'],
            ['name' => 'tourism.manage', 'display_name' => 'จัดการข้อมูลท่องเที่ยว', 'group' => 'tourism'],
            
            // Product Management
            ['name' => 'product.view', 'display_name' => 'ดูข้อมูลสินค้า', 'group' => 'products'],
            ['name' => 'product.create', 'display_name' => 'สร้างสินค้า', 'group' => 'products'],
            ['name' => 'product.edit', 'display_name' => 'แก้ไขสินค้า', 'group' => 'products'],
            ['name' => 'product.delete', 'display_name' => 'ลบสินค้า', 'group' => 'products'],
            ['name' => 'product.manage', 'display_name' => 'จัดการสินค้า', 'group' => 'products'],
            
            // Admin Access
            ['name' => 'admin.access', 'display_name' => 'เข้าถึงระบบ Admin', 'group' => 'admin'],
            ['name' => 'admin.dashboard', 'display_name' => 'ดู Dashboard Admin', 'group' => 'admin'],
            ['name' => 'admin.settings', 'display_name' => 'จัดการการตั้งค่า', 'group' => 'admin'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // สร้าง Roles
        $roles = [
            [
                'name' => 'super_admin',
                'display_name' => 'Super Admin',
                'description' => 'ผู้ดูแลระบบสูงสุด มีสิทธิ์ทุกอย่าง',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'ผู้ดูแลระบบ มีสิทธิ์จัดการเนื้อหาและผู้ใช้งาน',
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'ผู้แก้ไขเนื้อหา มีสิทธิ์จัดการข่าวและข้อมูลท่องเที่ยว',
            ],
            [
                'name' => 'author',
                'display_name' => 'Author',
                'description' => 'ผู้เขียนเนื้อหา มีสิทธิ์สร้างและแก้ไขเนื้อหาของตัวเอง',
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'ผู้ใช้งานทั่วไป',
            ],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }

        // กำหนด Permissions ให้กับ Roles
        $superAdmin = Role::where('name', 'super_admin')->first();
        $superAdmin->permissions()->sync(Permission::pluck('id'));

        $admin = Role::where('name', 'admin')->first();
        $adminPermissions = Permission::whereIn('name', [
            'user.view', 'user.create', 'user.edit', 'user.delete',
            'role.view', 'role.create', 'role.edit', 'role.delete',
            'permission.view', 'permission.create', 'permission.edit', 'permission.delete',
            'news.view', 'news.create', 'news.edit', 'news.delete', 'news.manage',
            'tourism.view', 'tourism.create', 'tourism.edit', 'tourism.delete', 'tourism.manage',
            'product.view', 'product.create', 'product.edit', 'product.delete', 'product.manage',
            'admin.access', 'admin.dashboard', 'admin.settings',
        ])->pluck('id');
        $admin->permissions()->sync($adminPermissions);

        $editor = Role::where('name', 'editor')->first();
        $editorPermissions = Permission::whereIn('name', [
            'news.view', 'news.create', 'news.edit', 'news.delete', 'news.manage',
            'tourism.view', 'tourism.create', 'tourism.edit', 'tourism.delete', 'tourism.manage',
            'product.view', 'product.create', 'product.edit', 'product.delete', 'product.manage',
        ])->pluck('id');
        $editor->permissions()->sync($editorPermissions);

        $author = Role::where('name', 'author')->first();
        $authorPermissions = Permission::whereIn('name', [
            'news.view', 'news.create', 'news.edit',
            'tourism.view', 'tourism.create', 'tourism.edit',
            'product.view', 'product.create', 'product.edit',
        ])->pluck('id');
        $author->permissions()->sync($authorPermissions);

        // สร้าง Super Admin User
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $superAdmin->id,
        ]);

        // กำหนด Role เพิ่มเติมให้ Super Admin
        $superAdminUser->assignRole($superAdmin);

        $this->command->info('Roles and Permissions seeded successfully!');
        $this->command->info('Super Admin created: admin@example.com / password');
    }
}
