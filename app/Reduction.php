<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    protected $table = 'reductions';

    protected $fillable = ['date_debut', 'date_fin', 'valeur'];
}
