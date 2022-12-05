<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_costs', function (Blueprint $table) {
            $table->id();
            $table->double('course_fee');
            $table->integer('course_discount_rate')->default(0);
            $table->double('course_discounted_cost');
            $table->date('course_registration_last_date')->nullable();
            $table->bigInteger('course_id');
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
        Schema::dropIfExists('course_costs');
    }
}
