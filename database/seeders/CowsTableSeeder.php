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

        foreach ($cows as $cow) {
            Cows::create($cow);
        }
    }
}
