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
                'color' => 'Golden',
                'price' => 150,
                'litters' => 5,
                'image' => 'uploads\cowImages\cow1.png',
            ],  [
                'cowName' => 'Holstein-Friesian',
                'color' => 'Green',
                'price' => 1500,
                'litters' => 55,
                'image' => 'uploads\cowImages\cow2.png',
            ],  [
                'cowName' => 'Bovines',
                'color' => 'Pink',
                'price' => 7500,
                'litters' => 277,
                'image' => 'uploads\cowImages\cow3.png',
            ],  [
                'cowName' => 'Angus',
                'color' => 'White',
                'price' => 37500,
                'litters' => 1430,
                'image' => 'uploads\cowImages\cow4.png',
            ],  [
                'cowName' => 'Sampson',
                'color' => 'Yellow',
                'price' => 150000,
                'litters' => 7230,
                'image' => 'uploads\cowImages\cow5.png',
            ],
            [
                'cowName' => 'Samjon',
                'color' => 'Red',
                'price' => 375000,
                'litters' => 21925,
                'image' => 'uploads\cowImages\cow6.png',
            ],
            
        ];
        foreach ($cows as $cow) {
            Cows::create($cow);
        }
    }
}
