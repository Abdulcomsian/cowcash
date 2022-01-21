<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PackageTxn;
use App\Models\Packages;
use Illuminate\Support\Str;

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
            'country_id' => '170',
        ]);
        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://127.0.0.1:8000') . '/register/?ref=' . $affiliateid;
        $user = User::create([
            'name' => 'Farmer1',
            'email' => 'farmer1@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
            'silver_coins' => 10000,
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'country_id' => '170',
            'currency' => '1',
        ]);
        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://127.0.0.1:8000') . '/register/?ref=' . $affiliateid;
        User::create([
            'name' => 'Farmer2',
            'email' => 'farmer2@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
            'silver_coins' => 10000,
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'country_id' => '170',
            'currency' => '1',
        ]);

        $packages = [
            [
                'Pkgname' => 'Silver Package',
                'amount' => 500,
                'coins_to_get' => 1000,
                'status' => 1,
            ],  [
                'Pkgname' => 'Pramium Package',
                'amount' => 1000,
                'coins_to_get' => 10000,
                'status' => 1,
            ],
        ];



        foreach ($packages as $pkg) {
            $packg = Packages::create($pkg);
        }
        PackageTxn::create([
            'user_id' => $user->id,
            'package_id' => $packg->id,
            'payment_method' => 'Paypal',
            'payment_status' => 1,
        ]);
    }
}