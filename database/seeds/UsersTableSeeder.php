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
                'vat_number' => '12345678912',
                'logo' => 'https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '09876954312',
                'logo' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '098763256',
                'logo' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '12345310912',
                'logo' => 'https://images.unsplash.com/photo-1587574293340-e0011c4e8ecf?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '11211311803',
                'logo' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '00044466677',
                'logo' => 'https://images.unsplash.com/photo-1485182708500-e8f1f318ba72?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjJ8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '12567666666',
                'logo' => 'https://images.unsplash.com/photo-1546195643-70f48f9c5b87?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzd8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '00000000054',
                'logo' => 'https://images.unsplash.com/photo-1564758866811-4780aa0a1f49?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
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
                'vat_number' => '30303030303',
                'logo' => 'https://images.unsplash.com/photo-1579236546973-39f510ef2a37?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Njd8fHJlc3RhdXJhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
            ],

        ];

        foreach ($users as $user) {
            $genres = Genre::all();

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
            $newUser->logo = $user['logo'];
            $newUser->save();

            $newUser->genres()->attach($genres[rand(0, 7)]);
        }
    }
}
