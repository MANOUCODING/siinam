<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;

    protected $gauarded = [];

    public function classesAffectations(){

        return $this->belongsTo(Classe::class);

    }

    public function matieresAffectations(){

        return $this->belongsTo(Matiere::class);

    }

    public function enseignantsAffectations(){

        return $this->belongsTo(Enseignant::class);

    }

    public function anneeScolaireAffectations(){

        return $this->belongsTo(AnneeScolaire::class);

    }
}
