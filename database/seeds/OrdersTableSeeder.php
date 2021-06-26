<?php

use App\Order;
use App\Plate;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'name' => 'Mattia',
                'lastname' => 'Rossi',
                'email' => 'mattiR@gmail.com',
                'address' => 'via Levanto 50',
                'phone_number' => '334 335666777',
                'total' => 27,
                'created_at' =>  date("2021-02-20")
            ],
            [
                'name' => 'Andrea',
                'lastname' => 'Bianchi',
                'email' => 'blanco@gmail.com',
                'address' => 'via Montemario 17',
                'phone_number' => '+39 36675898563',
                'total' => 35,
                'created_at' =>  date("2021-05-15")
            ],
            [
                'name' => 'Antonio',
                'lastname' => 'Mancini',
                'email' => 'mancio@gmail.com',
                'address' => 'via Cassia 17',
                'phone_number' => '+39 368686858563',
                'total' => 20,
                'created_at' =>  date("2021-01-02")
            ],
            [
                'name' => 'Bruno',
                'lastname' => 'Bruni',
                'email' => 'brunello@gmail.com',
                'address' => 'via Cassia 1020',
                'phone_number' => '+39 368686888863',
                'total' => 22,
                'created_at' =>  date("2021-01-11")
            ],
            [
                'name' => 'Riccardo',
                'lastname' => 'De Santis',
                'email' => 'brunello@gmail.com',
                'address' => 'via Cassia 1020',
                'phone_number' => '+39 368686888863',
                'total' => 28,
                'created_at' =>  date("2021-04-11")
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Antonini',
                'email' => 'antomarco@gmail.com',
                'address' => 'via Camilluccia 100',
                'phone_number' => '+39 363333863',
                'total' => 15,
                'created_at' =>  date("2021-05-13")
            ],

        ];

        
        foreach ($orders as $order) {
            $plates = Plate::all();
             
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->lastname = $order['lastname'];
            $newOrder->email = $order['email'];
            $newOrder->phone_number = $order['phone_number'];
            $newOrder->total = $order['total'];
            $newOrder->created_at = $order['created_at'];
            $newOrder->address = $order['address'];

            $newOrder->save();

            $newOrder->plates()->attach($plates[rand(0, 5)]);


        }

    }
}
