<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Farmer1',
            'email' => 'farmer1@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
        ]);
        User::create([
            'name' => 'Farmer2',
            'email' => 'farmer2@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
        ]);
    }
}
