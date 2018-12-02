<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //SELECT * from journals as j INNER JOIN conferences as c ON j.email= c.email WHERE j.pub_status = pending OR c.pub_status=pending//
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pub_status')->default('Pending');
            $table->string('email');
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('department');
            $table->string('claim_type');
            $table->string('project_name');
            $table->string('applying_for')->nullable();
            $table->string('status_pi');
            $table->string('funding_authority');
            $table->string('funding_amount');
            $table->string('date_of_award');
            $table->string('status');
            $table->integer('cash_rewards')->nullable()->default(0);
            $table->integer('reward_points')->nullable()->default(0);
            $table->string('remarks')->nullable();
            $table->string('file_name')->nullable()->default('No File');
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
        Schema::dropIfExists('researches');
    }
}
