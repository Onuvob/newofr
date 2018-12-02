<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewers', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('res_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('topic')->nullable();
            $table->string('applicant')->nullable();
            $table->string('review_status')->default('Pending');
            $table->string('report_status')->default('Not Submitted');
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
        Schema::dropIfExists('reviewers');
    }
}
