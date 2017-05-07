<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characterizable', function (Blueprint $table) {
            $table->integer('characteristic_id')->unsigned();
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
            $table->json('characteristic_values');
            $table->integer('characterizable_id')->unsigned();
            $table->string('characterizable_type');
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
        Schema::dropIfExists('characterizable');
    }
}
