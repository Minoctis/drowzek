<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProduitOption
 *
 * @property integer $id
 * @property string $libelle
 * @property string $img_name
 * @property float $prix_ht
 * @property integer $produit_id
 * @property integer $taux_tva_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Panier[] $paniers
 * @property-read \App\Models\Produit $produit
 * @property-read \App\Models\TauxTVA $tauxTVA
 */
class ProduitOption extends Model
{
    protected $table = 'produit_options';

    protected $fillable = ['libelle', 'prix_ht'];

    //Relationships

    public function paniers() {
        return $this->belongsToMany('App\Models\Panier');
    }

    public function produit() {
        return $this->belongsTo('App\Models\Produit');
    }

    public function tauxTva() {
        return $this->belongsTo('App\Models\TauxTVA', 'taux_tva_id');
    }
}
