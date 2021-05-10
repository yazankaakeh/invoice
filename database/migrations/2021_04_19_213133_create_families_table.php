<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('student_id')->nullable();
            // $table->foreign('student_id')->references('id')->on('students');
            // $table->unsignedBigInteger('medical_id')->nullable();
            // $table->foreign('medical_id')->references('id')->on('medicals');

            ########################## family info Begin ############################
            $table->string('family_Constraint');// صاحب القيد
            $table->string('family_number_member');// عدد أفراد
            $table->string('family_breadwinner');// المعيل
            $table->string('work_breadwinner');// المعيل
            $table->string('family_an_breadwinner');// المعيل الثاني
            $table->string('work_an_breadwinner');// المعيل الثاني
            $table->string('family_monthly_salary');// الراتب الشهري من العمل
            $table->string('phone');// هل يوجد مساعدات
            $table->string('sec_phone');// هل يوجد مساعدات
            $table->string('family_has_aid');// هل يوجد مساعدات
            $table->string('family_what_aid');// ماهي المساعدات
            $table->string('note');// 
            ########################## family info End ############################

            ########################## Parts ######################################
            $table->integer('husband_wife_statu')->default('0');
            $table->integer('residance_statu')->default('0');
            $table->integer('job_statu')->default('0');
            $table->integer('pay_statu')->default('0');
            $table->integer('father_mother_statu')->default('0');
            $table->integer('child_statu')->default('0');
            $table->integer('enable')->default('0');
            $table->integer('student_statu')->default('0');
            $table->integer('medical_statu')->default('0');
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
        Schema::dropIfExists('families');
    }
}
