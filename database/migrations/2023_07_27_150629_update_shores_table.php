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
        Schema::table('shores', function (Blueprint $table) {
            $table->boolean('has_volley_field')->nullable()->change();
            $table->boolean('has_soccer_field')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shores', function (Blueprint $table) {
            $table->boolean('has_volley_field')->change();
            $table->boolean('has_soccer_field')->change();
        });
    }
};
