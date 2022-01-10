<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('cow_id');
            $table->foreign('cow_id')->references('id')->on('cows');
            $table->float('per_hours_litters')->nullable();
            $table->double('total_milk')->nullable();
            $table->double('available_milk')->nullable();
            $table->double('sold_milk')->nullable();
            $table->tinyInteger('status')->default(1);

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
        Schema::dropIfExists('user_cows');
    }
}
