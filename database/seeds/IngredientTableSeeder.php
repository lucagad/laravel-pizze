<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

use Illuminate\Support\Str;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "pomodoro",
            "mozzarella",
            "basilico",
            "salame piccante",
            "mozzarella di bufala",
            "acciughe",
            "patatine",
            "pepe",
            "origano",
            "zucchine",
            "prosciutto cotto",
            "peperoni",
            "wurstel",
            "patate al forno",
            "olive"
        ];

        foreach ($data as $ingredient) {
            $new_ingredient = new Ingredient();
            $new_ingredient->name = $ingredient;
            $new_ingredient->slug = Str::slug($ingredient, '-');
            $new_ingredient->save();
        }


    }
}
