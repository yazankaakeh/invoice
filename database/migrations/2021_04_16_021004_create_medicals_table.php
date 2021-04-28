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
            $table->id();
            ########################## medical info Begin ############################
            $table->string('medical_name');// اسم المريض
            $table->string('medical_age');// عمر المريض
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('medical_have_id');// هل يوجد هوية
            $table->string('medical_id_extr');// مدينة أستخراج هوية
            $table->string('medical_number');//رقم الهاتف
            ########################## medical info End ############################
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
