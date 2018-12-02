<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('research_grants', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('pub_status')->default('Pending');
            $table->string('topic')->nullable();
            $table->string('area')->nullable();
            $table->string('prefix')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('list_of_inves')->nullable();

            $table->string('intro_back')->nullable();
            $table->string('question')->nullable();
            $table->string('biblography')->nullable();
            $table->string('methodology')->nullable();

            $table->string('jcp1_name')->nullable();
            $table->string('jcp1_index')->nullable();
            $table->string('jcp2_name')->nullable();
            $table->string('jcp2_index')->nullable();
            $table->string('jcp3_name')->nullable();
            $table->string('jcp3_index')->nullable();

            $table->string('patent_info')->nullable();
            $table->string('publish_country')->nullable();

            $table->string('tentative_budget')->nullable();
            $table->string('diff_institution')->nullable();
            $table->string('project_prospect')->nullable();
            $table->string('file_name')->nullable();

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
        Schema::dropIfExists('research_grants');
    }
}
