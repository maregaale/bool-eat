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
            [
                'name' => 'Iginio',
                'lastname' => 'Massari',
                'email' => 'iginio@libero.com',
                'password' => '7653071',
                'restaurant_name' => 'Precisione Cafè',
                'address' => 'via Meringa 55',
                'city' => 'Milano',
                'phone_number' => '+39 32431253',
                'vat_number' => '11211311803'
            ],
            [
                'name' => 'Joe',
                'lastname' => 'Bastianich',
                'email' => 'joe@gmail.com',
                'password' => 'ecomefilmdiorore',
                'restaurant_name' => 'Diludente',
                'address' => 'piazza Duomo 11',
                'city' => 'Milano',
                'phone_number' => '+39 32345673',
                'vat_number' => '00044466677'
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Giordano',
                'email' => 'pisellifvesch@hotmail.com',
                'password' => '100200300',
                'restaurant_name' => 'I Sapovi della mia tevva',
                'address' => 'via Turati 558',
                'city' => 'Milano',
                'phone_number' => '+39 32653853',
                'vat_number' => '12567666666'
            ],
            [
                'name' => 'Francesco',
                'lastname' => 'Aquila',
                'email' => 'ziobricco@gmail.com',
                'password' => 'ziobricco99',
                'restaurant_name' => 'Aquila Bistrot',
                'address' => 'arco della Pace 5',
                'city' => 'Milano',
                'phone_number' => '+39 328754322213',
                'vat_number' => '00000000054'
            ],
            [
                'name' => 'Giorgio',
                'lastname' => 'Locatelli',
                'email' => 'chefloca@gmail.com',
                'password' => 'cmonguys44',
                'restaurant_name' => 'la Doppietta',
                'address' => 'via Svizzera 30',
                'city' => 'Milano',
                'phone_number' => '+39 065544333',
                'vat_number' => '30303030303'
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

            $newUser->genres()->attach($genres[rand(0, 7)]);

        }
       



    }
}
