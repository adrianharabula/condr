<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterizablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characterizables', function (Blueprint $table) {
            // TODO: maybe add primary key for this table
            // $table->increments('id');

            $table->integer('characteristic_id')->unsigned();
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
            // cannot use $table->json yet for characteristic_values because it's not implemented yet
            // see here https://github.com/yajra/laravel-oci8/issues/283
            // and here https://docs.oracle.com/database/122/ADJSN/creating-a-table-with-a-json-column.htm
            $table->string('characteristic_values', 4000);
            $table->morphs('characterizable');
            $table->timestamps();

            // TODO: maybe add indexes for this table
            // $table->index('characteristic_id');
            // $table->index('characterizable_id');
            // $table->index('characterizable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characterizables');
    }
}
