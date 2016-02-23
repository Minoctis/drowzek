<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiance extends Model
{
    protected $table = 'ambiances';

    protected $fillable = ['nom', 'description', 'ordre', 'slug'];
}
