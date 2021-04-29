<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__residences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

########################### student residences info Begin ########################

            $table->string('stud_type_housing')->nullable();// نوع السكن
            $table->string('stud_rent_housing')->nullable(); // اجار المنزل
            $table->string('stud_Place_housing')->nullable(); // مكان اللإقامة
            $table->string('stud_expen')->nullable();/// مصاريف جامعية
            $table->string('stud_valu_expen')->nullable();// قيمة المصاريف

########################### student residences info End ########################

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
        Schema::dropIfExists('student__residences');
    }
}
