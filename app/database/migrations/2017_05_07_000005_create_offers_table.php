<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('merchant')->nullable();
            $table->string('domain')->nullable();
            $table->string('title');
            $table->string('currency')->nullable();
            $table->string('price')->nullable();
            $table->string('shipping')->nullable();
            $table->string('condition')->nullable();
            $table->string('availability')->nullable();
            $table->string('shop_link')->nullable();
            $table->integer('remote_updated_at')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
