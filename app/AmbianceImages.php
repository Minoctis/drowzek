<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbianceImages extends Model
{
    protected $table = 'ambiances_img';

    protected $fillable = ['*']; //champs remplis côté serveur
}
