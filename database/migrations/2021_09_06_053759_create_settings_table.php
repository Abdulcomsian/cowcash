<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('search')->nullable();
            $table->string('restorant_details_image')->nullable();
            $table->string('restorant_details_cover_image')->nullable();
            $table->string('description')->nullable();
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->string('currency')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('playstore')->nullable();
            $table->string('appstore')->nullable();
            $table->string('maps_api_key')->nullable();
            $table->double('delivery',10,2)->default('0.00');
            $table->string('typeform')->nullable();
            $table->string('mobile_info_title')->nullable();
            $table->string('mobile_info_subtitle')->nullable();
            $table->string('order_options')->nullable();
            $table->string('site_logo_dark')->nullable();
            $table->text('order_fields')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
