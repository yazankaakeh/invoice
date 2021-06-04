<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('medical_id')->nullable();
            $table->foreign('medical_id')->references('id')->on('medicals');
            $table->unsignedBigInteger('children_id')->nullable();
            $table->foreign('children_id')->references('id')->on('childrens');
            $table->unsignedBigInteger('husbandand_wives_id')->nullable();
            $table->foreign('husbandand_wives_id')->references('id')->on('husbandand_wives');

########################## medical_statuses info Begin ############################
            $table->string('disease_type')->nullable();//نوع المرض
            $table->string('disease_name')->nullable();// اسم المرض
            $table->string('dr_name')->nullable();// اسم الدكتور الحالي
            $table->string('treat_cost')->nullable();// نكلفة العلاج
            $table->string('treat_type')->nullable();// نوغ العلاج
            $table->string('treat_Duratio')->nullable();//مدة العلاج
            $table->date('date_accept')->nullable();// تاريخ القبول
            $table->date('date_end')->nullable();// تاريخ أنتهاء
            $table->string('Trans_to_doctor')->nullable();// التحويل الي طبيب أخر
########################## medical_statuses info End ############################

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
        Schema::dropIfExists('medical_statuses');
    }
}
