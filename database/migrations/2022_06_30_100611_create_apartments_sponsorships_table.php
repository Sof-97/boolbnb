<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_sponsorships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_apartment');
            $table->foreign('id_apartment')
                ->references('id')
                ->on('apartments')->onDelete('cascade');

            $table->unsignedBigInteger('id_sponsorship');
            $table->foreign('id_sponsorship')
                ->references('id')
                ->on('sponsorships')->onDelete('cascade');

            $table->dateTime('start_sponsorship');
            $table->dateTime('end_sponsorship');
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
        Schema::dropIfExists('apartments_sponsorships');
    }
}
