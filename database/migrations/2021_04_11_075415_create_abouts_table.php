<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('safety_tips')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('google_plus_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
