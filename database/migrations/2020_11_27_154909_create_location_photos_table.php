<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('file');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');        

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_photos');
    }
}
