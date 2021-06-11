<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');

           ########################## childre info Begin ############################

            $table->string('childre_name')->nullable();// أسماءهم
            $table->string('childre_age')->nullable();// الأعمار
            $table->string('childre_gender')->nullable();// االجنس
            $table->string('childre_educa_leve')->nullable();//مرحلة الدراسية
            $table->string('childre_class_number')->nullable(); // رقم الصف الدراسي
            $table->string('childre_id_extr')->nullable();// مدينة أصدار الهوية
            $table->string('childre_live_with')->nullable();//هل يعيشون معكم
            $table->string('medical_stat')->nullable();//هل يعيشون معكم
            $table->string('status')->nullable();//هل يعيشون معكم

            $table->string('student_statu')->nullable()->deafult(0);
            $table->string('family_statu')->nullable()->deafult(0);
            $table->string('medical_statu')->nullable()->deafult(0);
           ########################## childre info End ############################

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
        Schema::dropIfExists('childrens');
    }
}
