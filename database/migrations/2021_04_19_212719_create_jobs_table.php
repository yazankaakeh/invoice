<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');

            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');

            $table->unsignedBigInteger('sisterand_brothers_id')->nullable();
            $table->foreign('sisterand_brothers_id')->references('id')->on('sisterand_brothers');

            $table->unsignedBigInteger('fatherand_mothers_id')->nullable();
            $table->foreign('fatherand_mothers_id')->references('id')->on('fatherand_mothers');

            // $table->unsignedBigInteger('husbandand_wives');
            // $table->foreign('husbandand_wives_id')->references('id')->on('husbandand_wives');

########################## job info Begin ##############################
            $table->string('job_have',null);// هل تعمل
            $table->string('job_type',null);//نوع العمل
            $table->string('job_place',null);// مكان العمل
            $table->string('job_monthly_salary');// الراتب الشهري
            $table->string('job_last_have');// هل لديك عمل سابق
            $table->string('job_last_type');// نوع العمل السابق
            $table->string('job_last_salary');// الراتب السابق للعمل
########################## job info End ##############################
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
        Schema::dropIfExists('jobs');
    }
}
