<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePackageCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_package_costs', function (Blueprint $table) {
            $table->id();
            $table->double('package_fee');
            $table->integer('package_discount_rate')->default(0);
            $table->double('package_discounted_cost');
            $table->date('package_registration_last_date')->nullable();
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
        Schema::dropIfExists('course_package_costs');
    }
}
