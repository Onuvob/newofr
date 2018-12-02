<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('prefix')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('cash_rewards')->nullable()->default(0);
            $table->integer('reward_points')->nullable()->default(0);
            $table->integer('points')->nullable()->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_user')->default(0);
            $table->boolean('is_reviewer')->default(1);
            $table->string('password');
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
