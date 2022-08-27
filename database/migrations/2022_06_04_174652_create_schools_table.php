<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('nomEtablissement');
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('nomResponsable');
            $table->string('posteResponsable');
            $table->string('nomDRE');
            $table->string('nomIESEG');
            $table->string('denominationMinisterielGenerale');
            $table->string('denominationMinisterielTechnique');
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
        Schema::dropIfExists('schools');
    }
}
