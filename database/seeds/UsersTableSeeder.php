<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = "Samuele";
        $newUser->lastname = "Madrigali";
        $newUser->email = "forzasamp@gmail.com";
        $newUser->password = Hash::make('543210');
        $newUser->restaurant_name = "da Remo e Alice";
        $newUser->address = "via Levanto a Levanto 50";
        $newUser->city = "Milano";
        $newUser->phone_number = '+39 377890345';
        $newUser->vat_number = '12345678912';
        $newUser->save();
    }
}
