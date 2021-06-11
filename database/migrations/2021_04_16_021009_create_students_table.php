<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');
            $table->string('student_name')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('age')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('county_are_from')->nullable();//  من اي محافظة الأصل
            $table->string('social_state')->nullable();//  من اي محافظة الأصل
            $table->string('city_name')->nullable();// اسم المدينة الأصل
            $table->string('stu_Cur_housing')->nullable();// اسم مدينة السكن الحالي
            $table->string('entry_turkey')->nullable();// سنة الدخول الى تركيا
            $table->string('Identity_type')->nullable();// نوع الهوية
            $table->string('Id_stud_source')->nullable(); // مدينة أستخراج هوية
            $table->integer('husband_wife_statu')->default('0')->nullable();
            $table->integer('father_mother_statu')->default('0')->nullable();
            $table->integer('medical_statu')->default('0')->nullable();
            $table->integer('residance_statu')->default('0')->nullable();
            $table->integer('quran_statu')->default('0')->nullable();
            $table->integer('job_statu')->default('0')->nullable();
            $table->integer('scholarship_statu')->default('0')->nullable();
            $table->integer('university_statu')->default('0')->nullable();
            $table->integer('child_statu')->default('0')->nullable();
            $table->integer('form_statu')->default('0')->nullable();
            $table->integer('bim_statu')->default('0')->nullable();
            $table->integer('euro_statu')->default('0')->nullable();
            $table->integer('usd_statu')->default('0')->nullable();
            $table->integer('sis_statu')->default('0')->nullable();
            $table->integer('tr_statu')->default('0')->nullable();
            $table->integer('new_statu')->default('0')->nullable();
            $table->text('note')->nullable();//
            $table->integer('enable')->default('0')->nullable();
            $table->string('gender');
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
        Schema::dropIfExists('students');
    }
}
