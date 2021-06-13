<?php

use App\Plate;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $users = User::all();
        // foreach ($users as $user)
        // {
        //     for ($i = 0; $i < 10 ; $i++) { 
        //         $newPlate = new Plate();
        //         $newPlate->user_id = $user->id;            
        //         $newPlate->name = $faker->words(5, true);
        //         $newPlate->price = $faker->randomFloat(1, 10, 20);
        //         $newPlate->image = $faker->ImageUrl(640, 480);
        //         $newPlate->ingredients = $faker->text();
        //         $newPlate->description = $faker->text();
        //         $newPlate->scope = $faker->words(1, true);
        //         $newPlate->slug = Str::slug( $newPlate->name , '-');
        //         $newPlate->visible = rand(0,1);
        //         $newPlate->vegan = rand(0,1);
        //         $newPlate->vegetarian = rand(0,1);
        //         $newPlate->gluten_free = rand(0,1);
        //         $newPlate->hot = rand(0,1);
        //         $newPlate->save();
        //     }
    
        // }

        $plates = [
            [
                'name' => 'Spaghetti alle vongole',
                'price' => 13.50,
                'image' => 'https://www.grazia.it/content/uploads/2017/06/Spaghetti-alle-vongole-veraci-2.png',
                'ingredients' => 'Spaghetti, Aglio, Olio, Prezzemolo, Vongole Veraci, Peperoncino',
                'description' => 'Piatto tipicamente estivo, il più gettonato dagli italiani in vacanza.',
                'scope' => 'Primo',
                'visible' => 1,
                'vegan' => 0,
                'vegetarian' => 0,
                'gluten_free' => 0,
                'hot' => 0
            ],
            [
                'name' => 'Frittura mista',
                'price' => 8.50,
                'image' => 'https://www.ricettasprint.it/wp-content/uploads/2019/07/iStock-1132095296.jpg',
                'ingredients' => 'Gamberi, Calamari, Moscardini, Limone, Sale, Semola, Olio',
                'description' => 'Fritto misto gustoso e fresco da accompagnare con un buon vino bianco',
                'scope' => 'Antipasto',
                'visible' => 1,
                'vegan' => 0,
                'vegetarian' => 1,
                'gluten_free' => 0,
                'hot' => 0
            ],
            [
                'name' => 'Risotto alla crema di scampi',
                'price' => 17.50,
                'image' => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2018/01/risotto-alla-crema-di-scampi.jpg',
                'ingredients' => 'Riso Carnaroli, Scalogno, Scampi, Olio, Aglio, Limone, Pepe, Sale, Timo',
                'description' => 'Risotto gustoso e saporito, inconfondibile per la sua dolcezza e unicità',
                'scope' => 'Primo',
                'visible' => 1,
                'vegan' => 0,
                'vegetarian' => 0,
                'gluten_free' => 0,
                'hot' => 0
            ],
            [
                'name' => 'Tiramisù',
                'price' => 6,
                'image' => 'https://www.turismo.it/typo3temp/pics/4f8d8a4631.jpg',
                'ingredients' => 'Mascaropone, Savoiardi, Zucchero, Uovo, Marsala, Caffè, Cacao',
                'description' => 'Il tiramisù è un dolce e prodotto agroalimentare tradizionale diffuso in tutto il territorio italiano, le cui origini sono dibattute e attribuite soprattutto al Veneto e al Friuli-Venezia Giulia.',
                'scope' => 'Dolce',
                'visible' => 1,
                'vegan' => 0,
                'vegetarian' => 1,
                'gluten_free' => 0,
                'hot' => 0
            ]

        ];

        foreach ($plates as $plate) {
            $newPlate = new Plate();
            $newPlate->user_id = 1;
            $newPlate->name = $plate['name'];
            $newPlate->price = $plate['price'];
            $newPlate->image = $plate['image'];
            $newPlate->ingredients = $plate['ingredients'];
            $newPlate->description = $plate['description'];
            $newPlate->scope = $plate['scope'];
            $newPlate->visible = $plate['visible'];
            $newPlate->vegan = $plate['vegan'];
            $newPlate->vegetarian = $plate['vegetarian'];
            $newPlate->gluten_free = $plate['gluten_free'];
            $newPlate->hot = $plate['hot'];
            $newPlate->slug = Str::slug( $plate['name'] , '-');
            $newPlate->save();
        }
        


    }
}
