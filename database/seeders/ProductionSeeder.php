<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ProductionSeeder
     * ó php artisan migrate:fresh --seed --seeder=ProductionSeeder
     */
    public function run(): void
    {
        User::create([
            'name' => "José",
            'email' => "admin@email.com",
            'password' => Hash::make(env('ADMIN_PASS')),
            'email_verified_at' => now(),
            'role_id' => User::ROLES['admin'],
        ]);
    }
}
