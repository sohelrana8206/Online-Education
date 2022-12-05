<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('option_one');
            $table->string('option_two');
            $table->string('option_three')->nullable();
            $table->string('option_four')->nullable();
            $table->string('answer');
            $table->bigInteger('course_quiz_setting_id');
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
        Schema::dropIfExists('course_quiz_questions');
    }
}
