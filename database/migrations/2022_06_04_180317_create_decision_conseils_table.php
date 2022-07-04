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
            $table->string('classe_id');
            $table->string('moyFaible');
            $table->string('moyFort');
            $table->string('decision');
            $table->string('statut')->default("Nouveau");
            $table->boolean('dejaRedoublerDansCycle')->default(0);
            $table->string('detailsDecision');
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
