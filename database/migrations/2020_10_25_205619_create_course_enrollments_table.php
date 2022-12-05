<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id');
            $table->string('type');
            $table->bigInteger('user_id')->comment('Student');
            $table->date('enrollment_start_date')->nullable();
            $table->date('enrollment_end_date')->nullable();
            $table->boolean('is_payment')->default(0);
            $table->string('tran_id')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('course_enrollments');
    }
}
