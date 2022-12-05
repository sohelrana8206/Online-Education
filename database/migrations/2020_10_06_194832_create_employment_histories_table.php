<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('company_name');
            $table->string('company_business');
            $table->string('designation');
            $table->string('department');
            $table->string('responsibility');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('company_address');
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
        Schema::dropIfExists('employment_histories');
    }
}
