<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisterandBrothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisterand_brothers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            ########################## sister info Begin ############################
            $table->string('name');// الأسم
            $table->string('age');// العمر
            $table->string('gender');// الجنس
            $table->string('academicel');// مستوى الدراسي
            $table->string('special');// الأختصاص
            $table->string('work');// العمل الحالي
            $table->string('salary');//الراتب الشهري
            ########################## sister info End ############################
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
        Schema::dropIfExists('sisterand_brothers');
    }
}
