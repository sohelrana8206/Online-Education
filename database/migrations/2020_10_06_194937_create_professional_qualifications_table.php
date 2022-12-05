<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('certificate_name');
            $table->string('institute');
            $table->string('location');
            $table->date('form_date');
            $table->date('to_date');
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
        Schema::dropIfExists('professional_qualifications');
    }
}
