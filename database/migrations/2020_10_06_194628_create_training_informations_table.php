<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_informations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('training_title');
            $table->string('topic');
            $table->string('institute');
            $table->string('country');
            $table->string('location');
            $table->year('year');
            $table->string('duration');
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
        Schema::dropIfExists('training_informations');
    }
}
