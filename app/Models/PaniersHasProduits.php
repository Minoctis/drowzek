<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\PaniersHasProduits
 *
 * @property integer $id
 * @property integer $panier_id
 * @property integer $produit_option_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class PaniersHasProduits extends Model
{
    protected $table = 'paniers_has_produits';
    protected $fillable = ['panier_id', 'produit_option_id'];

}
