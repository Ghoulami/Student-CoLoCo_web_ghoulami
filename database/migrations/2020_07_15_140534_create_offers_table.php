<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->double('property_price');
            $table->string('telephone')->nullable();
            $table->string('imgPath')->nullable();
            $table->text('description :');
            $table->integer('capacity');
            $table->string('city')->nullable();
            $table->string('adresse')->nullable();
            $table->double('area')->nullable();;
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->date('add_date')->nullable()->useCurrent();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
