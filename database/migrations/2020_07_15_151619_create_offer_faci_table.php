<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferFaciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_faci', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('offer_id')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->unsignedBigInteger('facilitie_id')->nullable();
            $table->foreign('facilitie_id')->references('id')->on('facilities')->onDelete('cascade');

            $table->unsignedBigInteger('demand_id')->nullable();
            $table->foreign('demand_id')->references('id')->on('demands')->onDelete('cascade');

            $table->unique(['offer_id','facilitie_id',]);
            $table->unique(['demand_id','facilitie_id',]);
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
        Schema::dropIfExists('offer_faci');
    }
}
