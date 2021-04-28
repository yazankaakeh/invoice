<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuransTable extends Migration
{

    public function up()
    {
        Schema::create('qurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            ########################## qurans info Begin ############################
            $table->string('quran_memorize')->nullable();// هل تحفظ قرأن
            $table->string('quran_parts')->nullable();// عدد أجزاء
            $table->string('quran_teacher')->nullable(); //  مدرسك
            $table->string('quran_have_certif')->nullable();// هل تملك شهادة
            $table->string('quran_Certif_essuer')->nullable();//مصدر الشهادة
            $table->string('quran_with_Certif')->nullable();//هل هي معك

            ########################## qurans info End ############################

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
        Schema::dropIfExists('qurans');
    }
}
