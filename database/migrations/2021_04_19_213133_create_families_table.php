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
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            ########################## family info Begin ############################
            $table->string('family_Constraint');// صاحب القيد
            $table->string('family_number_member');// عدد أفراد
            $table->string('family_breadwinner');// المعيل
            $table->string('family_an_breadwinner');// المعيل الثاني
            $table->string('family_monthly_salary');// الراتب الشهري من العمل
            $table->string('family_has_aid');// هل يوجد مساعدات
            $table->string('family_what_aid');// ماهي المساعدات
            ########################## family info End ############################

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
