<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
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
            $table->string('book_type');
            $table->string('book_name');
            $table->string('list_of_authors');
            $table->string('authors_affiliation');
            $table->string('publisher');
            $table->string('isbn')->nullable();
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
        Schema::dropIfExists('books');
    }
}
