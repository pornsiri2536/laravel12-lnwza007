<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles if using spatie/laravel-permission (optional, safe to ignore if not installed)
        try {
            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $super = \Spatie\Permission\Models\Role::findOrCreate('super_admin');
                $admin = \Spatie\Permission\Models\Role::findOrCreate('admin');
            }
        } catch (\Throwable $e) {
            // silently ignore if roles table not present
        }

        // Upsert two admin users
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@example.com',
                'password' => Hash::make('admin123'),
            ],
        ];

        foreach ($users as $u) {
            $existing = DB::table('users')->where('email', $u['email'])->orWhere('name', $u['name'])->first();
            if ($existing) {
                DB::table('users')->where('id', $existing->id)->update([
                    'name' => $u['name'],
                    'email' => $u['email'],
                    'password' => $u['password'],
                    'updated_at' => now(),
                ]);
                $userId = $existing->id;
            } else {
                $userId = DB::table('users')->insertGetId([
                    'name' => $u['name'],
                    'email' => $u['email'],
                    'password' => $u['password'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Assign roles if available
            try {
                if (class_exists(\App\Models\User::class) && method_exists(\App\Models\User::class, 'find')) {
                    /** @var \App\Models\User $user */
                    $user = \App\Models\User::find($userId);
                    if ($user && method_exists($user, 'assignRole')) {
                        $user->assignRole($u['name'] === 'admin' ? 'super_admin' : 'admin');
                    }
                }
            } catch (\Throwable $e) {
                // ignore if roles not installed
            }
        }
    }
}
