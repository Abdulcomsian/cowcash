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
                'price' => 1000,
                'litters' => 100,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 2000,
                'litters' => 200,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Holstein-Friesian',
                'color' => 'Black',
                'price' => 3000,
                'litters' => 300,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 4000,
                'litters' => 400,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Angus',
                'color' => 'White Black',
                'price' => 5000,
                'litters' => 500,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Sampson',
                'color' => 'White',
                'price' => 10000,
                'litters' => 800,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
            [
                'cowName' => 'Samjon',
                'color' => 'White',
                'price' => 20000,
                'litters' => 900,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
            [
                'cowName' => 'Anwarcow',
                'color' => 'White',
                'price' => 30000,
                'litters' => 1000,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
        ];
        foreach ($cows as $cow) {
            Cows::create($cow);
        }
    }
}
