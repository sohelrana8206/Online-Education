<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnInCoursePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_packages', function (Blueprint $table) {
            $table->dropColumn('package_cost');
            $table->dropColumn('package_discount_rate');
            $table->dropColumn('package_registration_last_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_packages', function (Blueprint $table) {
            //
        });
    }
}
