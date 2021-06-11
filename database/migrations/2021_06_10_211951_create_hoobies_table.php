<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoobiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoobies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('children_id');
            $table->foreign('children_id')->references('id')->on('childrens');

            $table->string('skills')->nullable();// المهارات
            $table->string('language')->nullable(); //  اللغات
            $table->string('fav_active')->nullable();//  انشطة مفضلة

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
        Schema::dropIfExists('hoobies');
    }
}
