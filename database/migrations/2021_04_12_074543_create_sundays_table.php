<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSundaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sundays', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')->nullable();
            $table->string('day')->default('Sunday');
            $table->string('opening_status')->default('open');
            $table->string('opening_time')->nullable();
            $table->string('closing_time')->nullable();
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
        Schema::dropIfExists('sundays');
    }
}
