<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{

    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->integer('value_usd')->nullable();
            $table->integer('value_usd_fixed')->nullable();

            $table->integer('value_tr')->nullable();
            $table->integer('value_tr_fixed')->nullable();
            
            $table->integer('value_euro')->nullable();
            $table->integer('value_euro_fixed')->nullable();
            
            $table->integer('value_bim')->nullable();
            $table->integer('number_bim')->nullable();
            $table->integer('number_bim_fixed')->nullable();
            $table->integer('incomes_statu')->default('0')->nullable();

            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
