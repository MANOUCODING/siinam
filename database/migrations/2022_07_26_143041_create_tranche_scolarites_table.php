<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrancheScolaritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranche_scolarites', function (Blueprint $table) {
            $table->id();
            $table->string("libelleTranche");
            $table->string("prixTrancheScolarite");
            $table->unsignedBigInteger('scolarite_id');
            $table->foreign('scolarite_id')->references('id')->on('scolarites');
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
        Schema::dropIfExists('tranche_scolarites');
    }
}
