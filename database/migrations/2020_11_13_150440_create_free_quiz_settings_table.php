<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeQuizSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_quiz_settings', function (Blueprint $table) {
            $table->id();
            $table->string('quiz_name');
            $table->bigInteger('time_duration');
            $table->bigInteger('course_sub_category');
            $table->bigInteger('user_id');
            $table->boolean('status');
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
        Schema::dropIfExists('free_quiz_settings');
    }
}
