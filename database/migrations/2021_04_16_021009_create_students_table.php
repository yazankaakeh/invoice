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
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');
            $table->string('student_name');
            $table->date('birthday');
            $table->integer('age');
            $table->string('email');
            $table->string('phone');
            $table->string('county_are_from');//  من اي محافظة الأصل
            $table->string('city_name');// اسم المدينة الأصل
            $table->string('stu_Cur_housing');// اسم مدينة السكن الحالي
            $table->string('entry_turkey');// سنة الدخول الى تركيا
            $table->string('Identity_type');// نوع الهوية
            $table->string('Id_stud_source'); // مدينة أستخراج هوية
            $table->integer('husband_wife_statu')->default('0');
            $table->integer('father_mother_statu')->default('0');
            $table->integer('medical_statu')->default('0');
            $table->integer('residance_statu')->default('0');
            $table->integer('quran_statu')->default('0');
            $table->integer('job_statu')->default('0');
            $table->integer('scholarship_statu')->default('0');
            $table->integer('university_statu')->default('0');
            $table->enum('gender', ['ذكر', 'انثى'])->default('ذكر');
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
