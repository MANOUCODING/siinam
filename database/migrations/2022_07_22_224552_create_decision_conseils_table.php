<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionConseilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_conseils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classe_id');
            $table->string('moyFaible');
            $table->string('moyFort');
            $table->string('decision');
            $table->string('status')->default("Nouveau");
            $table->string('detailsDecision');
            $table->foreign('classe_id')->references('id')->on('classes');
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
        Schema::dropIfExists('decision_conseils');
    }
}
