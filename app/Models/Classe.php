<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function affectationsClasses(){

        return $this->hasMany(Affectation::class);

    }

    public function appreciationsSemestresClasses(){

        return $this->hasMany(AppreciationSemestre::class);
        
    }
}
