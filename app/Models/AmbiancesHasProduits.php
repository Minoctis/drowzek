<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AmbiancesHasProduits
 *
 * @property integer $id
 * @property integer $produit_id
 * @property integer $ambiance_id
 */
class AmbiancesHasProduits extends Model
{
    protected $table = 'ambiances_has_produits';
}
