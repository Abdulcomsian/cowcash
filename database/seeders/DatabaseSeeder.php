<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(\Database\Seeders\CountriesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CowsTableSeeder::class);
    }
}
