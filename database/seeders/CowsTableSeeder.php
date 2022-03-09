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
            // [
            //     'cowName' => 'Heifers',
            //     'color' => 'White',
            //     'price' => 1000,
            //     'litters' => 100,
            //     'image' => 'uploads\cowImages\bulls.jpg',
            // ],  
            [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 150,
                'litters' => 5,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Holstein-Friesian',
                'color' => 'Black',
                'price' => 5500,
                'litters' => 55,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Black',
                'price' => 7500,
                'litters' => 277,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Angus',
                'color' => 'White Black',
                'price' => 37500,
                'litters' => 1430,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],  [
                'cowName' => 'Sampson',
                'color' => 'White',
                'price' => 150000,
                'litters' => 7230,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
            [
                'cowName' => 'Samjon',
                'color' => 'White',
                'price' => 375000,
                'litters' => 21925,
                'image' => 'uploads\cowImages\bulls.jpg',
            ],
            // [
            //     'cowName' => 'Anwarcow',
            //     'color' => 'White',
            //     'price' => 30000,
            //     'litters' => 1000,
            //     'image' => 'uploads\cowImages\bulls.jpg',
            // ],
        ];
        foreach ($cows as $cow) {
            Cows::create($cow);
        }
    }
}
