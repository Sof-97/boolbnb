<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_service', function (Blueprint $table) {
            $table->id();
            //Relation manytomany apartments
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            //Relation manytomany services
            $table->unsignedBigInteger('service_id')->nullable(false);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('apartment_service');
    }
}
