<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cows;

class CowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cows = [
            [
                'cowName' => 'Heifers',
                'color' => 'White',
                'price' => 90000,
                'litters' => 5,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 10000,
                'litters' => 10,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Holstein-Friesian',
                'color' => 'Black',
                'price' => 70000,
                'litters' => 3,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 10000,
                'litters' => 5,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Angus',
                'color' => 'White Black',
                'price' => 150000,
                'litters' => 15,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Sampson',
                'color' => 'White',
                'price' => 200000,
                'litters' => 20,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
        ];

        //package entry
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



        foreach ($cows as $cow) {
            Cows::create($cow);
        }
    }
}
