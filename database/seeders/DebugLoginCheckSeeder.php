<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DebugLoginCheckSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'pornsiri.vei@vru.ac.th';
        $password = 'Admin@12345';

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->command?->error('User not found: ' . $email);
            return;
        }

        $this->command?->info('Found user ID: ' . $user->id);
        $this->command?->info('is_active: ' . var_export($user->is_active, true));
        $this->command?->info('email_verified_at: ' . ($user->email_verified_at ? $user->email_verified_at->toDateTimeString() : 'null'));

        $ok = Hash::check($password, $user->password);
        $this->command?->info('Hash::check(Admin@12345): ' . ($ok ? 'TRUE' : 'FALSE'));
    }
}
