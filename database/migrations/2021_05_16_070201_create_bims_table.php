<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bims', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students'); //->onDelete('cascade') for deleting the payment after the students
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');
            
            $table->id();
            $table->integer('value_bim_medical')->nullable();
            $table->integer('number_bim_medical')->nullable();

            $table->integer('value_bim_student')->nullable();
            $table->integer('number_bim_student')->nullable();
            
            $table->integer('value_bim_family')->nullable();
            $table->integer('number_bim_family')->nullable();

            $table->string('Note')->nullable();
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
        Schema::dropIfExists('bims');
    }
}
