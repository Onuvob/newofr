<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pub_status')->default('Pending');
            $table->string('email');
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('department');
            $table->string('applying_for')->nullable();
            $table->string('claim_type');
            $table->string('journal_type');
            $table->string('article_title');
            $table->string('list_of_authors');
            $table->string('authors_affiliation');
            $table->string('name_of_journal');
            $table->string('publisher');
            $table->string('isbn')->nullable();
            $table->string('doi')->nullable();
            $table->string('impact_factor')->nullable();
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
        Schema::dropIfExists('journals');
    }
}
