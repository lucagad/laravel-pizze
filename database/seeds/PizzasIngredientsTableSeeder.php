<?php

use Illuminate\Database\Seeder;
use App\Pizza;
use App\Ingredient;

class PizzasIngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = Pizza::all();
        
        foreach ($pizzas as $pizza) {
            
            for ($i = 0 ; $i < mt_rand(1,5); $i++) { 
                
                $ingredient_id = Ingredient::inRandomOrder()->first()->id;

                $pizza->ingredients()->attach($ingredient_id);

            }

        }
    }
}
