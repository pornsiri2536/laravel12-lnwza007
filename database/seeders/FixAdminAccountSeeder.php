<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;

class FixAdminAccountSeeder extends Seeder
{
    public function run(): void
    {
        // ลบ user อีเมล pornsiri.vei@vru.ac.th ทั้งหมดก่อนสร้างใหม่
        \App\Models\User::where('email', 'pornsiri.vei@vru.ac.th')->delete();

        // สร้างใหม่ด้วย bcrypt hash
        User::create([
            'name' => 'User',
            'email' => 'pornsiri.vei@vru.ac.th',
            'password' => app('hash')->make('P@ss123456'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
