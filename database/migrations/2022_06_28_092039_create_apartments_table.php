<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('cover_image')->nullable(true);
            $table->float('latitude')->nullable(false);
            $table->float('longitude')->nullable(false);
            $table->string('address')->nullable(false);
            $table->tinyInteger('rooms')->nullable(false);
            $table->tinyInteger('beds')->nullable(false);
            $table->tinyInteger('bathrooms')->nullable(false);
            $table->smallInteger('mq2')->nullable(false);
            $table->boolean('is_visible')->default(true);
            $table->string('slug')->unique();
            $table->foreign('id_user')
                ->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
}
