<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecisionConseil extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classesDecisionConseil(){

        return $this->belongsTo(Classe::class);

    }
}
