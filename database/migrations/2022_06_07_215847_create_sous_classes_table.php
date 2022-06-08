<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_classes', function (Blueprint $table) {
            $table->id();
            $table->string('codeClasse');
            $table->integer('effectif');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
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
        Schema::dropIfExists('sous_classes');
    }
}
