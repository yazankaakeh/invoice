<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('children_id')->nullable();
            $table->foreign('children_id')->references('id')->on('childrens');

            ########################## school info Begin ############################

            $table->string('School_name')->nullable();
            $table->string('School_type')->nullable();
            $table->string('School_location')->nullable();
            $table->string('School_cost')->nullable();///   أقساط مدرسية
            $table->string('School_fees')->nullable();/// مصاريف مدرسية



            ########################## school info End ############################
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
        Schema::dropIfExists('schools');
    }
}
