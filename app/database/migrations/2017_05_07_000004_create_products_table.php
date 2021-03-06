<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('upc_code')->unique();
            $table->string('ean_code')->unique();
            $table->string('name', 512);
            $table->string('brand')->nullable();
            $table->string('description', 3000)->nullable();
            $table->string('image_url')->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->string('lowest_recorded_price')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
