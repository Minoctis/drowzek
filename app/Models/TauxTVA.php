<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TauxTVA
 *
 * @property integer $id
 * @property float $valeur
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProduitOption[] $produits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommandeProduit[] $commandeProduits
 */
class TauxTVA extends Model
{
    protected $table = 'taux_tva';

    //Relationships
    public function produits() {
        return $this->hasMany('App\Models\ProduitOption', 'taux_tva_id');
    }

    public function commandeProduits() {
        return $this->hasMany('App\Models\CommandeProduit', 'taux_tva_id');
    }
}
