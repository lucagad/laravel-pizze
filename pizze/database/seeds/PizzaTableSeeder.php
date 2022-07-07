<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Pizza;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $pizze = config('pizze');

        foreach ($pizze as $pizza) {


            $new_pizza = new Pizza();

            $new_pizza->fill($pizza);
            if($new_pizza->is_veggie == "sì"){
                $new_pizza->is_veggie = true;
            }else{
                $new_pizza->is_veggie = false;
            }
            if(!$new_pizza->popularity){
                $new_pizza->popularity = $faker->numberBetween(5, 10);
            }
            $new_pizza->description = $faker->text(100);
            $new_pizza->slug = $new_pizza->generateSlug($new_pizza->name);
            $new_pizza->save();
        }
    }
}
