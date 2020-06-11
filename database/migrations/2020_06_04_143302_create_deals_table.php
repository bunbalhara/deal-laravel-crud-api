<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id');
            $table->string('outboundDate',50);
            $table->string('inboundDate',50);
            $table->string('price', 50);
            $table->string('packageDeeplinkUrl', 400);
            $table->string('hotelName', 200);
            $table->string('hotelRoomBoard', 100);
            $table->integer('hotelTrustYouReviewsReviewCount');
            $table->float('hotelTrustYouReviewsReviewScore');
            $table->string('hotelTrustYouReviewsImageUrl', 200);
            $table->string('hotelDefaultImg',200);
            $table->string('flightDataTakeoffHour',10);
            $table->string('flightDataLandingHour',10);
            $table->string('flightDataTravelDurationFormat',10);
            $table->integer('flightDataNbEscales');
            $table->string('flightDataCityFromAirportCode',3);
            $table->string('flightDataCityToAirportCode',3);
            $table->string('flightDataInboundTakeoffHour',10);
            $table->string('flightDataInboundLandingHour',10);
            $table->string('flightDataInboundTravelDurationFormat',10);
            $table->string('flightDataInboundCityFromAirportCode',10);
            $table->string('flightDataInboundCityToAirportCode',10);
            $table->boolean('active');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
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
        Schema::dropIfExists('deals');
    }
}
