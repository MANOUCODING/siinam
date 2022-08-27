<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("status")->default("Nouveau");
            $table->string("category")->default("Inscrit");
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('anneeScolaire_id');
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('anneeScolaire_id')->references('id')->on('annee_scolaires');
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
        Schema::dropIfExists('eleves');
    }
}
