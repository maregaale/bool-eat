<?php

use App\Genre;
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
       

        $users = [
            [
                'name' => 'Samuele',
                'lastname' => 'Madrigali',
                'email' => 'forzasamp@gmail.com',
                'password' => '543210',
                'restaurant_name' => 'da Remo e Alice',
                'address' => 'via Levanto a Levanto 50',
                'city' => 'Milano',
                'phone_number' => '+39 377890345',
                'vat_number' => '12345678912'
            ],
            [
                'name' => 'Carlo',
                'lastname' => 'Cracco',
                'email' => 'cracco@gmail.com',
                'password' => '123456789',
                'restaurant_name' => 'Cracco Bistrot',
                'address' => 'via Monte Napoleone 17',
                'city' => 'Milano',
                'phone_number' => '+39 366655543',
                'vat_number' => '09876954312'
            ],
            [
                'name' => 'Antonino',
                'lastname' => 'Cannavacciuolo',
                'email' => 'addios@gmail.com',
                'password' => 'forzaaa123',
                'restaurant_name' => 'da Cannavacciuolo a Milano',
                'address' => 'piazza Duomo 1',
                'city' => 'Milano',
                'phone_number' => '+39 37787655',
                'vat_number' => '098763256'
            ],
            [
                'name' => 'Bruno',
                'lastname' => 'Barbieri',
                'email' => 'bruno@gmail.com',
                'password' => '76543210',
                'restaurant_name' => 'al Mappazzone',
                'address' => 'via Tortellino 11',
                'city' => 'Milano',
                'phone_number' => '+39 32887653',
                'vat_number' => '12345310912'
            ],

        ];

        foreach ($users as $user) {
            $genres= Genre::all();

            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->restaurant_name = $user['restaurant_name'];
            $newUser->address = $user['address'];
            $newUser->city = $user['city'];
            $newUser->phone_number = $user['phone_number'];
            $newUser->vat_number = $user['vat_number'];
            $newUser->save();

            $newUser->genres()->attach($genres[rand(0, 9)]);

        }
       



    }
}
