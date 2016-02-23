<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitOptions extends Model
{
    protected $table = 'produit_options';

    protected $fillable = ['libelle', 'prix_ht'];
}
