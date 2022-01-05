<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Driver
        $demoDriverId=DB::table('users')->insertGetId([
            'name' => 'Demo Driver 1',
            'email' =>  'driver1@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign driver role
        DB::table('model_has_roles')->insert([
            'role_id' => 3,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoDriverId,
        ]);

        //Driver 2
        $demoDriverId2=DB::table('users')->insertGetId([
            'name' => 'Demo Driver 2',
            'email' =>  'driver2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign driver role
        DB::table('model_has_roles')->insert([
            'role_id' => 3,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoDriverId2,
        ]);

        //Client 1
        $demoClientId=DB::table('users')->insertGetId([
            'name' => 'Demo Client 1',
            'email' =>  'client1@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign client role
        DB::table('model_has_roles')->insert([
            'role_id' => 4,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoClientId,
        ]);

        //Client 2
        $demoClientId2=DB::table('users')->insertGetId([
            'name' => 'Demo Client 2',
            'email' =>  'client2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign client role
        DB::table('model_has_roles')->insert([
            'role_id' => 4,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoClientId2,
        ]);

        //Restorant owner
        $demoOwnerId=DB::table('users')->insertGetId([
            'name' => 'Demo Owner 1',
            'email' =>  'owner1@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign owner role
        DB::table('model_has_roles')->insert([
            'role_id' =>2,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoOwnerId,
        ]);

         //Restorant owner
        $demoOwnerId=DB::table('users')->insertGetId([
            'name' => 'Demo Owner 2',
            'email' =>  'owner2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone' =>  '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Assign owner role
        DB::table('model_has_roles')->insert([
            'role_id' =>2,
            'model_type' =>  \App\Models\User::class,
            'model_id'=> $demoOwnerId,
        ]);


    }
}
