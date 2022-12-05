<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBatchStudentMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_batch_student_mappings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_batch_id');
            $table->bigInteger('user_id')->comment('Student');
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
        Schema::dropIfExists('course_batch_student_mappings');
    }
}
