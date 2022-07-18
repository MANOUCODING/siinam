<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->string('jour');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('anneeScolaire_id');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
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
        Schema::dropIfExists('affectations');
    }
}
