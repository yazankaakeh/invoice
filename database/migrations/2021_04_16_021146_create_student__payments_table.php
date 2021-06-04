<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students'); //->onDelete('cascade') for deleting the payment after the students
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');

            $table->integer('value')->nullable();
            $table->integer('value_usd')->nullable();
            $table->integer('value_euro')->nullable();

            $table->integer('family_value')->nullable();
            $table->integer('family_value_usd')->nullable();
            $table->integer('family_value_euro')->nullable();
            
            $table->integer('medical_value')->nullable();
            $table->integer('medical_value_usd')->nullable();
            $table->integer('medical_value_euro')->nullable();

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
        Schema::dropIfExists('student__payments');
    }
}
