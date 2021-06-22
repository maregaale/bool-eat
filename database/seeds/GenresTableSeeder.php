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
                'logo' => 'https://f.roocdn.com/images/menus/225238/header-image.jpg?width=353&height=177&auto=webp&format=jpg&fit=crop&v=1585830197'
            ],
            [
                'name' => 'Kebab',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcr7s48S-Wb828vUJxSOMFP84U_qZNNL7XaQ&usqp=CAU'
            ],
            [
                'name' => 'Greco',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkSkFugaYhE6lHxxCrw_QiZXdGecQiWbPlWQ&usqp=CAU'
            ],
            [
                'name' => 'Pizza',
                'logo' => 'https://f.roocdn.com/images/menus/63776/header-image.jpg?width=353&height=177&auto=webp&format=jpg&fit=crop&v=1556873766'
            ],
            [
                'name' => 'Giapponese',
                'logo' => 'https://f.roocdn.com/images/menus/213898/header-image.jpg?width=353&height=177&auto=webp&format=jpg&fit=crop&v=1573558821'
            ],
            [
                'name' => 'Thai',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT254aPmxCxqqWswCyrcd-FiBDkV8DgqfTQrg&usqp=CAU'
            ],
            [
                'name' => 'Mediterraneo',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRisD1QodUmR8BsQuFBa6WfqaVwdg1Chf6glA&usqp=CAU'
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
            $newGenre->slug = Str::slug($genre['name'], '-');
            $newGenre->save();
        }
    }
}
