<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('codeEnseignant');
            $table->string('nomEnseignant');
            $table->string('prenomsEnseignant');
            $table->string('adresseEnseignant');
            $table->string('emailEnseignant');
            $table->string('telephoneEnseignant');
            $table->string('passwordEnseignant');
            $table->string('photoProfilEnseignant')->nullable();
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
        Schema::dropIfExists('enseignants');
    }
}
