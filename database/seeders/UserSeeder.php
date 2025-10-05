<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // เพิ่มผู้ใช้ทั่วไปสำหรับเว็บไซต์สาธารณะ
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Visitor',
                'email' => 'visitor@example.com',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($users as $data) {
            User::updateOrCreate(['email' => $data['email']], $data);
        }
    }
}
