<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCharacteristicVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_characteristic_vote', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('characteristic_id')->unsigned();
            $table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');
            $table->integer('vote_id')->unsigned()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_characteristic_vote');
    }
}
