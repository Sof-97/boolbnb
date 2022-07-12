<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('apartment_id')->nullable(false);
            $table->text('text')->nullable(false);
            $table->string('email_sender')->nullable(false);
            
            $table->timestamps();
           
            $table->foreign('apartment_id')
                ->references('id')
                ->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
