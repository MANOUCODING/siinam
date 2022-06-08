<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppreciationSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appreciation_semestres', function (Blueprint $table) {
            $table->id();
            $table->string('moyFaible');
            $table->string('moyFort');
            $table->string('nomCycle');
            $table->string('appreciation');
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
        Schema::dropIfExists('appreciation_semestres');
    }
}
