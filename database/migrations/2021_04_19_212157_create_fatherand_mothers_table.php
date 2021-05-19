<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatherandMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatherand_mothers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');
            ########################## mother info Begin ############################
            $table->string('mother_name');// الأسم
            $table->date('mother_birth')->nullable();// تاريخ ميلاد
            $table->string('mother_origin')->nullable();// الأصل
            $table->string('mother_origin_city')->nullable();// المدينة
            $table->string('mother_academicel')->nullable();// مستوى الدراسي
            $table->string('mother_special')->nullable();// الأختصاص
            $table->string('mother_is_work')->nullable();//هل تعمل
            $table->string('mother_now_work')->nullable();// العمل الحالي
            $table->string('medical_mom')->nullable();// العمل الحالي
            $table->string('mother_salary')->nullable();//الراتب الشهري
            ########################## mother info End ############################
            ########################## father info Begin ############################
            $table->string('father_name');// الأسم
            $table->date('father_birth')->nullable();// تاريخ ميلاد
            $table->string('father_origin')->nullable();// الأصل
            $table->string('father_origin_city')->nullable();// المدينة
            $table->string('father_academicel')->nullable();// مستوى الدراسي
            $table->string('father_special')->nullable();// الأختصاص
            $table->string('father_is_work')->nullable();//هل تعمل
            $table->string('father_now_work')->nullable();// العمل الحالي
            $table->string('medical_dad')->nullable();//الراتب الشهري
            $table->string('father_salary')->nullable();//الراتب الشهري
            ########################## father info End ############################
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
        Schema::dropIfExists('fatherand_mothers');
    }
}
