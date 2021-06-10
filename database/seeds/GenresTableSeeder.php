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
            "Hamburger",
            "Kebab",
            "Greco",
            "Pizza",
            "Giapponese",
            "Thai",
            "Mediterraneo",
            "Cinese",
            "Pesce"
        ];
        foreach ($genres as $genre) {
            $newGenre = new Genre(); 
            $newGenre->name = $genre;
            $newGenre->slug = Str::slug( $genre , '-');
            $newGenre->save();
        }
    }
}
