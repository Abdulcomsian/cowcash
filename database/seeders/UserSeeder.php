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
        $referal_link = env('APP_URL', 'http://accrualhub.com') . '/account/registration/?ref=' . $affiliateid;
        $user = User::create([
            'name' => 'Farmer1',
            'email' => 'farmer1@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
            'silver_coins' => 100000,
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'country_id' => '170',
            'currency' => 'USD',
        ]);
        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://accrualhub.com') . '/account/registration/?ref=' . $affiliateid;
        User::create([
            'name' => 'Farmer2',
            'email' => 'farmer2@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('farmer123'),
            'role' => 'farmer',
            'silver_coins' => 100000,
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'country_id' => '170',
            'currency' => 'USD',
        ]);

        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://accrualhub.com') . '/account/registration/?ref=' . $affiliateid;
        User::create([
            'name' => 'Areeb',
            'email' => 'areeb@gmail.com',
            'email_verified_at' => '2021-07-30',
            'password' => bcrypt('123456'),
            'role' => 'farmer',
            'silver_coins' => 1000000,
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'country_id' => '170',
            'currency' => 'USD',
        ]);

        $packages = [
            [
                'Pkgname' => 'Silver Package',
                'amount' => 10,
                'coins_to_get' => 82433,
                'discount' => 7,
                'status' => 1,
            ],  [
                'Pkgname' => 'Silver Package',
                'amount' => 50,
                'coins_to_get' => 412163,
                'discount' => 10,
                'status' => 1,
            ],
            [
                'Pkgname' => 'Silver Package',
                'amount' => 100,
                'coins_to_get' => 824325,
                'discount' => 19,
                'status' => 1,
            ],
            [
                'Pkgname' => 'Silver Package',
                'amount' => 250,
                'coins_to_get' => 2060811,
                'discount' => 26,
                'status' => 1,
            ],
            [
                'Pkgname' => 'Silver Package',
                'amount' => 500,
                'coins_to_get' => 4121622,
                'discount' => 35,
                'status' => 1,
            ],
        ];



        foreach ($packages as $pkg) {
            $packg = Packages::create($pkg);
        }
    }
}
