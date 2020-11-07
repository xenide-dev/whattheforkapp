<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->longText("title")->nullable();
            $table->json("nutritions")->nullable();
            $table->json("ingredients")->nullable();
            $table->json("preparations")->nullable();
            $table->unsignedBigInteger("added_by_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('added_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
