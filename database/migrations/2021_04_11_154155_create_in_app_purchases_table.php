<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInAppPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_app_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('day')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('is_published')->nullable();
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
        Schema::dropIfExists('in_app_purchases');
    }
}
