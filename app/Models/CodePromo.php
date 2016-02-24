<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodePromo extends Model
{
    protected $table = 'codes_promo';

    protected $fillable = ['code', 'date_debut', 'date_fin', 'valeur'];
}
