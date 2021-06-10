<?php

use App\Plate;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <10 ; $i++) { 
            $newPlate = new Plate();
            $newPlate->name = $faker->words(5);
            $newPlate->price = $faker->randomfloat(1, 10, 20);
            $newPlate->image = $faker->ImageUrl(640, 480);
            $newPlate->ingredients = $faker->text();
            $newPlate->description = $faker->text();
            $newPlate->scope = $faker->words(1);
            $newPlate->slug = Str::slug( $newPlate->name , '-');;
            $newPlate->visible = rand(0,1);
            $newPlate->vegan = rand(0,1);
            $newPlate->vegetable = rand(0,1);
            $newPlate->gluten_free = rand(0,1);
            $newPlate->hot = rand(0,1);
            $newPlate->save();
        }

    }
}
