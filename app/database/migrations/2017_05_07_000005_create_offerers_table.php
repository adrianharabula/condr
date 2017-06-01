<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('domain')->nullable();
            $table->string('price')->nullable();
            $table->string('shipping')->nullable();
            $table->string('condition')->nullable();
            $table->string('availability')->nullable();
            $table->string('link')->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('offerers');
    }
}
