<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->float('silver_coins')->default(0);
            $table->float('gold_coins')->default(0);
            $table->float('withdraw')->default(0);
            $table->float('crystal')->default(0);
            $table->string('referred_by')->nullable();
            $table->string('affiliate_id')->unique()->nullable();
            $table->string('referal_link')->nullable();
            $table->float('referal_coins')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('bonus_time')->nullable();
            $table->tinyInteger('bonus_status')->default(0);
            $table->integer('currency')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
