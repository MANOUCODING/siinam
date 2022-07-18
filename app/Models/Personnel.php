<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rolePersonnel(){

        return $this->belongsTo(Role::class);

    }

    public function users(){

        return $this->hasMany(User::class);

    }
}
