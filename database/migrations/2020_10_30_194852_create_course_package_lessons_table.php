<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePackageLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_package_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('package_lesson_title');
            $table->text('package_lesson_description');
            $table->string('package_lesson_duration');
            $table->date('package_lesson_start_date')->nullable();
            $table->bigInteger('course_package_id');
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
        Schema::dropIfExists('course_package_lessons');
    }
}
