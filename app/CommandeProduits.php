<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandeProduits extends Model
{
    protected $table = 'commande_produits';

    protected $fillable = ['*'];
}
