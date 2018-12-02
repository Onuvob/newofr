<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pub_status')->default('Pending');
            $table->string('email');
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation');
            $table->string('department');
            $table->string('claim_type');
            $table->string('applying_for')->nullable();
            $table->string('chapter_type');
            $table->string('article_title');
            $table->string('list_of_authors');
            $table->string('authors_affiliation');
            $table->string('book_title');
            $table->string('publisher');
            $table->string('isbn')->nullable();
            $table->string('doi')->nullable();
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
        Schema::dropIfExists('book_chapters');
    }
}
