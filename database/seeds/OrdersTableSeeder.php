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
                'lastname' => 'Rossato',
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
                'created_at' =>  date("2021-01-20")
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
                'name' => 'Mattia',
                'lastname' => 'Mattei',
                'email' => 'mtlo@gmail.com',
                'address' => 'via Cassia 120',
                'phone_number' => '+39 366888863',
                'total' => 22,
                'created_at' =>  date("2021-01-12")
            ],
            [
                'name' => 'Riccardo',
                'lastname' => 'De Santis',
                'email' => 'brunello@gmail.com',
                'address' => 'via Cassia 1020',
                'phone_number' => '+39 368686888863',
                'total' => 28,
                'created_at' =>  date("2021-02-15")
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Marcelli',
                'email' => 'antomarco@gmail.com',
                'address' => 'via Camilluccia 100',
                'phone_number' => '+39 363333863',
                'total' => 15,
                'created_at' =>  date("2021-05-13")
            ],
            [
                'name' => 'Mattia',
                'lastname' => 'Rossato',
                'email' => 'mattiR@gmail.com',
                'address' => 'via Levanto 50',
                'phone_number' => '334 335666777',
                'total' => 27,
                'created_at' =>  date("2021-04-20")
            ],
            [
                'name' => 'Andrea',
                'lastname' => 'Bianchi',
                'email' => 'blanco@gmail.com',
                'address' => 'via Montemario 17',
                'phone_number' => '+39 36675898563',
                'total' => 35,
                'created_at' =>  date("2021-01-20")
            ],
            [
                'name' => 'Antonio',
                'lastname' => 'Mancini',
                'email' => 'mancio@gmail.com',
                'address' => 'via Cassia 17',
                'phone_number' => '+39 368686858563',
                'total' => 20,
                'created_at' =>  date("2021-04-02")
            ],
            [
                'name' => 'Mattia',
                'lastname' => 'Mattei',
                'email' => 'mtlo@gmail.com',
                'address' => 'via Cassia 120',
                'phone_number' => '+39 366888863',
                'total' => 22,
                'created_at' =>  date("2021-01-12")
            ],
            [
                'name' => 'Antonio',
                'lastname' => 'Franchi',
                'email' => 'franco@gmail.com',
                'address' => 'via Cassia 10',
                'phone_number' => '+39 36333863',
                'total' => 40,
                'created_at' =>  date("2021-03-18")
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Marcelli',
                'email' => 'antomco@gmail.com',
                'address' => 'via Cortina  100',
                'phone_number' => '+39 388833863',
                'total' => 25,
                'created_at' =>  date("2021-02-13")
            ],


            [
                'name' => 'Andrea',
                'lastname' => 'Frattali',
                'email' => 'andre@gmail.com',
                'address' => 'via Montemario 50',
                'phone_number' => '334 37686906777',
                'total' => 24,
                'created_at' =>  date("2021-04-20")
            ],
            [
                'name' => 'Andrea',
                'lastname' => 'Bianchi',
                'email' => 'blanco@gmail.com',
                'address' => 'via Montemario 17',
                'phone_number' => '+39 36675898563',
                'total' => 35,
                'created_at' =>  date("2021-04-20")
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
                'name' => 'Mattia',
                'lastname' => 'Mattei',
                'email' => 'mtlo@gmail.com',
                'address' => 'via Cassia 120',
                'phone_number' => '+39 366888863',
                'total' => 22,
                'created_at' =>  date("2021-01-12")
            ],
            [
                'name' => 'Riccardo',
                'lastname' => 'De Santis',
                'email' => 'brunello@gmail.com',
                'address' => 'via Cassia 1020',
                'phone_number' => '+39 368686888863',
                'total' => 28,
                'created_at' =>  date("2021-02-15")
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Marcelli',
                'email' => 'antomarco@gmail.com',
                'address' => 'via Camilluccia 100',
                'phone_number' => '+39 363333863',
                'total' => 15,
                'created_at' =>  date("2021-05-13")
            ],
            [
                'name' => 'Mattia',
                'lastname' => 'Rossato',
                'email' => 'mattiR@gmail.com',
                'address' => 'via Levanto 50',
                'phone_number' => '334 335666777',
                'total' => 27,
                'created_at' =>  date("2021-03-20")
            ],
            [
                'name' => 'Andrea',
                'lastname' => 'Bianchi',
                'email' => 'blanco@gmail.com',
                'address' => 'via Montemario 17',
                'phone_number' => '+39 36675898563',
                'total' => 35,
                'created_at' =>  date("2021-0-20")
            ],
            [
                'name' => 'Antonio',
                'lastname' => 'Mancini',
                'email' => 'mancio@gmail.com',
                'address' => 'via Cassia 17',
                'phone_number' => '+39 368686858563',
                'total' => 20,
                'created_at' =>  date("2021-02-22")
            ],
            [
                'name' => 'Mattia',
                'lastname' => 'Mattei',
                'email' => 'mtlo@gmail.com',
                'address' => 'via Cassia 120',
                'phone_number' => '+39 366888863',
                'total' => 22,
                'created_at' =>  date("2021-06-12")
            ],
            [
                'name' => 'Antonio',
                'lastname' => 'Franchi',
                'email' => 'franco@gmail.com',
                'address' => 'via Cassia 10',
                'phone_number' => '+39 36333863',
                'total' => 40,
                'created_at' =>  date("2021-03-18")
            ],
            [
                'name' => 'Marco',
                'lastname' => 'Marcelli',
                'email' => 'antomco@gmail.com',
                'address' => 'via Cortina  100',
                'phone_number' => '+39 388833863',
                'total' => 25,
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

            $newOrder->plates()->attach($plates[rand(5, 19)]);


        }

    }
}
