<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $path = '/uploads/settings/';
//        if(!File::exists(public_path().$path)) {
//            File::makeDirectory(public_path().$path, 0775, true); //creates directory
//        }

        //Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' =>  'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        //ADD ADMIN USER ROLE
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> 1,
        ]);

        //Default setting is created for first time setup app
        Settings::create([
            'site_name' => config('app.name'),
            'site_logo' =>  '/default/logo.png',
            'site_logo_dark' =>  '/default/logo.png',
            'restorant_details_image' => '/default/restaurant_large.jpg',
            'restorant_details_cover_image' => '/default/cover.jpg',
            'search' => '/default/cover.jpg',
            'description' => 'Food Delivery from best restaurants',
            'header_title' => 'Food Delivery from<br /><b>New York’s</b> Best Restaurants',
            'header_subtitle' => 'The meals you love, delivered with care',
            'delivery'=> 0,
            'maps_api_key' => 'AIzaSyCZhq0g1x1ttXPa1QB3ylcDQPTAzp_KUgA',
            'mobile_info_title' => 'Download the food you love',
            'mobile_info_subtitle' => 'It`s all at your fingertips - the restaurants you love. Find the right food to suit your mood, and make the first bite last. Go ahead, download us.',
        ]);
    }
}
