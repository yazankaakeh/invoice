<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelayedScholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delayed_scholars', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->date('date');
            $table->string('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delayed_scholars');
    }
}
