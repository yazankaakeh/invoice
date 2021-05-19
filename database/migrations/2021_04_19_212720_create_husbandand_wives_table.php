<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHusbandandWivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('husbandand_wives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');

            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');
########################## wife info Begin ############################
            $table->string('gender')->nullable();
            $table->string('wife_name')->nullable();
            $table->date('wife_birth')->nullable();
            $table->string('wife_city')->nullable();// الأصل و المدينة
            $table->string('wife_district')->nullable();// الأصل و المدينة
            $table->string('wife_mar_stat')->nullable();// Social status for (family)
            $table->string('wife_academicel')->nullable();
            $table->string('wife_special')->nullable();
            $table->string('medical_mom')->nullable();
            $table->string('wife_is_work')->nullable();// هل يعمل
            $table->string('wife_now_work')->nullable();
            $table->string('wife_Pre_work')->nullable(); // العمل السابق
########################## wife info End ############################
########################## husband info Begin ############################
            $table->string('husb_name')->nullable();
            $table->date('husb_birth')->nullable();
            $table->string('husb_Orig_city')->nullable();
            $table->string('husb_district')->nullable();// الأصل و المدينة
            $table->string('husb_mar_stat')->nullable();
            $table->string('husb_academicel')->nullable();
            $table->string('husb_special')->nullable();
            $table->string('husb_is_work')->nullable();
            $table->string('husb_now_work')->nullable();
            $table->string('medical_dad')->nullable();
            $table->string('husb_Pre_work')->nullable();
########################## husband info End ############################
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
        Schema::dropIfExists('husbandand_wives');
    }
}
