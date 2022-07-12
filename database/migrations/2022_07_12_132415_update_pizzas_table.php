<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_pizza', function (Blueprint $table) {

            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->unsignedBigInteger('pizza_id')->nullable();

            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('set null');

            $table->foreign('pizza_id')
                ->references('id')
                ->on('pizzas')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredient');
    }
}
