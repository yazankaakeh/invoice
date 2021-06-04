<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            ########################## scholarships info Begin ############################
            $table->string('scholar_name')->nullable();// أسم
            $table->string('scholar_type')->nullable();// نوع
            $table->string('scholar_value')->nullable();// قيمة
            $table->string('scholar_source')->nullable();//الجهة مانحة
            ########################## scholarships info Begin ############################

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
        Schema::dropIfExists('scholarships');
    }
}
