<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFromsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('froms', function (Blueprint $table) {
            $table->id();
            $table->integer('student_form')->deafult(0)->nullable();
            $table->integer('family_form')->deafult(0)->nullable();
            $table->integer('medical_form')->deafult(0)->nullable();
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
        Schema::dropIfExists('froms');
    }
}