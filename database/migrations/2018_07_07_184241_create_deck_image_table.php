<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeckImageTable extends Migration
{
    public function up()
    {
        Schema::create('deck_image', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('deck_id')->unsigned();
            $table->foreign('deck_id')->references('id')->on('decks')->onDelete('cascade');;

            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deck_image');
    }
}
