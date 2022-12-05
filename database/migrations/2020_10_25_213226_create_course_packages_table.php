<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_title');
            $table->string('package_subtitle');
            $table->string('course_sub_category_id');
            $table->text('package_details');
            $table->text('package_requirements')->nullable();
            $table->text('package_component')->nullable();
            $table->text('package_benefit')->nullable();
            $table->text('package_content')->nullable();
            $table->string('package_duration');
            $table->string('package_image');
            $table->double('package_cost');
            $table->integer('package_discount_rate')->default(0);
            $table->date('package_registration_last_date')->nullable();
            $table->boolean('is_package_verified')->default(0)->comment('0 = Pending, 1 = Approve, 2 = Rejected');
            $table->bigInteger('user_id')->comment('Package Creator');
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
        Schema::dropIfExists('course_packages');
    }
}
