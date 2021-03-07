<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecingredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipes_id');
            $table->foreignId('ingredients_id');
            $table->integer('quantity');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recingredients');
    }
}
