<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProduitAssocie
 *
 * @property integer $id
 * @property integer $produit_1
 * @property integer $produit_2
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class ProduitAssocie extends Model
{
    protected $table = 'produits_associes';

}
