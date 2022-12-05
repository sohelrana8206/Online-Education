<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_title');
            $table->string('course_sub_title');
            $table->bigInteger('course_sub_category_id');
            $table->text('course_details');
            $table->text('course_requirement')->nullable();
            $table->text('course_component')->nullable();
            $table->text('course_benefit')->nullable();
            $table->text('course_content')->nullable();
            $table->string('course_duration');
            $table->string('course_image');
            $table->double('course_fee');
            $table->integer('course_discount_rate')->default(0);
            $table->date('course_registration_last_date')->nullable();
            $table->boolean('is_course_verified')->default(0)->comment('0 = Pending, 1 = Approve, 2 = Rejected');
            $table->bigInteger('user_id')->comment('Course Creator');
            $table->boolean('status')->default(1)->comment('0 = Active, 1 = Inactive');
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
        Schema::dropIfExists('courses');
    }
}
