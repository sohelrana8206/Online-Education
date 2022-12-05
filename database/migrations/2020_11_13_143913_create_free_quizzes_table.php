<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('questions');
            $table->string('option_one');
            $table->string('option_two');
            $table->string('option_three')->nullable();
            $table->string('option_four')->nullable();
            $table->string('answer');
            $table->bigInteger('free_quiz_setting_id');
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
        Schema::dropIfExists('free_quizzes');
    }
}
