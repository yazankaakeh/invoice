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
            $table->string('name')->nullable();// الأسم
            $table->string('age')->nullable();// العمر
            $table->string('gender')->nullable();// الجنس
            $table->string('academicel')->nullable();// مستوى الدراسي
            $table->string('special')->nullable();// الأختصاص
            $table->string('work')->nullable();// العمل الحالي
            $table->string('salary')->nullable();//الراتب الشهري
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
