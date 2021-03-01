<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            
        $User = array(
            array(
                'name' => 'Admin Satu',
                'age'=>21,
                'email'=>'dery@test.com',
                'password'=>Hash::make('adminadmin'),
                //admin

               
            ),
            array(
                'name' => 'User Satu',
                'age'=>20,
                'email'=>'user@test.com',
                'password'=>Hash::make('useruser'),    
                //verif user           
            ),
            array(
                'name' => 'Guest Satu',
                'age'=>29,
                'email'=>'guest@test.com',
                'password'=>Hash::make('guestguest'),               
            ),
        );
        
        DB::table('users')->insert($User);
    }
}
