<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_services', function (Blueprint $table) {
            $table->id();
           
            //Relation manytomany apartments
            $table->unsignedBigInteger('id_apartment')->nullable(false);
            $table->foreign('id_apartment')->references('id')->on('apartments')->onDelete('cascade');

            //Relation manytomany services

             $table->unsignedBigInteger('id_service')->nullable(false);
             $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
            


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
        Schema::dropIfExists('apartments_services');
    }
}
