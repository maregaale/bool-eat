<?php

use App\Genre;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                'name' => 'Hamburger',
                'logo' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ],
            [
                'name' => 'Kebab',
                'logo' => 'https://images.pexels.com/photos/2955819/pexels-photo-2955819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
            ],
            [
                'name' => 'Greco',
                'logo' => 'https://images.pexels.com/photos/1211887/pexels-photo-1211887.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260'
            ],
            [
                'name' => 'Pizza',
                'logo' => 'https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
            ],
            [
                'name' => 'Giapponese',
                'logo' => 'https://images.pexels.com/photos/2871757/pexels-photo-2871757.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
            ],
            [
                'name' => 'Thai',
                'logo' => 'https://images.pexels.com/photos/6646067/pexels-photo-6646067.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ],
            [
                'name' => 'Mediterraneo',
                'logo' => 'https://images.pexels.com/photos/803963/pexels-photo-803963.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ],
            [
                'name' => 'Cinese',
                'logo' => 'https://images.pexels.com/photos/3728295/pexels-photo-3728295.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ],
            [
                'name' => 'Pesce',
                'logo' => 'https://images.pexels.com/photos/3655916/pexels-photo-3655916.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ]
        ];
        foreach ($genres as $genre) {
            $newGenre = new Genre(); 
            $newGenre->name = $genre['name'];
            $newGenre->logo = $genre['logo'];
            $newGenre->slug = Str::slug( $genre['name'] , '-');
            $newGenre->save();
        }
    }
}
