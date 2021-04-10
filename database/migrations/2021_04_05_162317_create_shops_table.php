<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('added_by')->nullable();
            $table->integer('user_id');
            $table->string('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('established_date')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('street_address')->nullable();
            $table->text('additional_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('description')->nullable();
            $table->double('min_price',8,2)->nullable();
            $table->double('max_price',8,2)->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_qrcode_link')->nullable();
            $table->string('discount_qrcode_image')->nullable();
            $table->string('lat')->nullable();
            $table->string('lan')->nullable();
            $table->integer('approve_status')->default(0);
            $table->string('view_count')->default(0);
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
        Schema::dropIfExists('shops');
    }
}
