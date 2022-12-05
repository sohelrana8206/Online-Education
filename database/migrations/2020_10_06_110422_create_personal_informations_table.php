<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('mobile');
            $table->date('birth_date');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('national_id_no')->nullable();
            $table->string('religion')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('home_district');
            $table->string('present_address')->nullable();
            $table->string('upazila');
            $table->string('current_location')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('personal_informations');
    }
}
