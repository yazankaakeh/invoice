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
            $table->string('family_Constraint')->nullable();// صاحب القيد
            $table->string('gender')->nullable();// عدد أفراد
            $table->string('family_number_member')->nullable();// عدد أفراد
            $table->string('family_breadwinner')->nullable();// المعيل
            $table->string('work_breadwinner')->nullable();// المعيل
            $table->string('family_an_breadwinner')->nullable();// المعيل الثاني
            $table->string('work_an_breadwinner')->nullable();// المعيل الثاني
            $table->string('family_monthly_salary')->nullable();// الراتب الشهري من العمل
            $table->string('aid_value')->nullable();// هل يوجد مساعدات
            $table->string('phone')->nullable();// هل يوجد مساعدات
            $table->string('sec_phone')->nullable();// هل يوجد مساعدات
            $table->string('family_has_aid')->nullable();// هل يوجد مساعدات
            $table->string('family_what_aid')->nullable();// ماهي المساعدات
            $table->string('academicel')->nullable();// ماهي المساعدات
            $table->string('now_work')->nullable();// ماهي المساعدات
            $table->string('work')->nullable();// ماهي المساعدات
            $table->string('city')->nullable();// ماهي المساعدات
            $table->text('note')->nullable();//
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
            $table->integer('patient_statu')->default('0');
            $table->integer('bim_statu')->default('0');
            $table->integer('euro_statu')->default('0');
            $table->integer('usd_statu')->default('0');
            $table->integer('tr_statu')->default('0');
            $table->integer('new_statu')->default('0')->nullable();
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
