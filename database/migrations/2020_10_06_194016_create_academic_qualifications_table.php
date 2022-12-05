<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('exam_title');
            $table->string('major');
            $table->string('institute');
            $table->string('result');
            $table->year('passing_year');
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
        Schema::dropIfExists('academic_qualifications');
    }
}
