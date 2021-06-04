<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families');


            $table->id();
            ########################## medical info Begin ##############################
            $table->string('medical_name')->nullable();// اسم المريض
            $table->string('medical_age')->nullable();// عمر المريض
            $table->string('gender')->nullable();
            $table->string('medical_have_id')->nullable();// هل يوجد هوية
            $table->string('medical_id_extr')->nullable();// مدينة أستخراج هوية
            $table->string('medical_number')->nullable();//رقم الهاتف
            $table->string('note')->nullable();//
            ########################## medical info End ################################
            $table->integer('husband_wife_statu')->default('0');
            $table->integer('residance_statu')->default('0');
            $table->integer('job_statu')->default('0');
            $table->integer('pay_statu')->default('0');
            $table->integer('child_statu')->default('0');
            $table->integer('father_mother_statu')->default('0');
            $table->integer('enable')->default('0');
            $table->integer('student_statu')->default('0');
            $table->integer('medical_statu')->default('0');
            $table->integer('bim_statu')->default('0');
            $table->integer('euro_statu')->default('0');
            $table->integer('usd_statu')->default('0');
            $table->integer('tr_statu')->default('0');
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
        Schema::dropIfExists('medicals');
    }
}
