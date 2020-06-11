<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
            $table->foreign('theme_id')
                ->references('id')
                ->on('themes')
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
        Schema::dropIfExists('location_themes');
    }
}
