<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('location');
            $table->smallInteger('beach_umbrella')->unsigned();
            $table->smallInteger('beach_bed')->unsigned();
            $table->float('daily_price', 4, 2);
            $table->date('opening_date');
            $table->date('closing_date');
            $table->boolean('has_volley_field');
            $table->boolean('has_soccer_field');
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
        Schema::dropIfExists('shores');
    }
};
