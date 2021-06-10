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
        $users = User::all();
        foreach ($users as $user)
        {
            for ($i = 0; $i < 10 ; $i++) { 
                $newPlate = new Plate();
                $newPlate->user_id = $user->id;            
                $newPlate->name = $faker->words(5, true);
                $newPlate->price = $faker->randomFloat(1, 10, 20);
                $newPlate->image = $faker->ImageUrl(640, 480);
                $newPlate->ingredients = $faker->text();
                $newPlate->description = $faker->text();
                $newPlate->scope = $faker->words(1, true);
                $newPlate->slug = Str::slug( $newPlate->name , '-');
                $newPlate->visible = rand(0,1);
                $newPlate->vegan = rand(0,1);
                $newPlate->vegetarian = rand(0,1);
                $newPlate->gluten_free = rand(0,1);
                $newPlate->hot = rand(0,1);
                $newPlate->save();
            }
    
        }
        


    }
}
