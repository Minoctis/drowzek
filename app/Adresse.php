<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $table = 'adresses';

    protected $fillable = ['*']; //Tous les champs sont remplis côté serveur, pas de risque d'exploit
}
