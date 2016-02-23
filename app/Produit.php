<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $fillable = ['nom', 'description', 'dimensions'];
}
