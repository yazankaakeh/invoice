<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('sisterand_brothers_id')->nullable();
            $table->foreign('sisterand_brothers_id')->references('id')->on('sisterand_brothers');

            $table->unsignedBigInteger('husband_wives_id')->nullable();
            $table->foreign('husband_wives_id')->references('id')->on('husband_wives');

            $table->unsignedBigInteger('fatherand_mothers_id')->nullable();
            $table->foreign('fatherand_mothers_id')->references('id')->on('fatherand_mothers');

            ########################## universities info Begin ############################

            $table->string('univer_name')->nullable();// اسم الجامعة
            $table->string('univer_location')->nullable(); // موقع الجامعة
            $table->string('univer_special')->nullable();// أختصاص
            $table->string('Number_years')->nullable();// عدد السنوات
            $table->string('Schoo_year')->nullable();// السنة الدراسية
            $table->string('Current_rate')->nullable();// المعدل الحالي
            $table->string('Cumulative_rate')->nullable(); // المعدل التراكمي
            $table->string('language_name')->nullable();// اللعة الدراسية
            $table->string('Current_level')->nullable();// المستوى الحالي للغة
            $table->string('Curr_level_rate')->nullable();// معدل المستوى الحالي للغة
            $table->string('Previ_level_rate')->nullable();//معدل المستوى السابق للغة
            $table->string('Univer_Accept')->nullable();// طريقة القبول بالجامعة
            $table->string('Accept_rate')->nullable();//معدل القبول
            $table->string('are_you_univer')->nullable();// هل انت يجامعة أخرى
            $table->string('Ano_univer_name')->nullable();// جامعة أخرى أسم
            $table->string('Ano_univer_special')->nullable();//  اسم أختصاص أخر
            $table->string('Ano_univer_Accept')->nullable();// كيفية القبول بالجامعة الأخرى
            $table->string('Ano_accept_rate')->nullable();// معدل القبول جامعة الأخرى
            $table->string('Ano_Schoo_year')->nullable();// السنة الدراسية الأخرى
            $table->string('Ano_Current_rate')->nullable();// المعدل للحامعة الأخرى
            $table->string('univer_Premiums')->nullable();//اقساط جامعية
            $table->string('univer_fees')->nullable();//مصاريف جامعية
            $table->string('univer_fees_value')->nullable();//كم مصاريف جامعية
            ########################## universities info End ############################
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
        Schema::dropIfExists('universities');
    }
}
