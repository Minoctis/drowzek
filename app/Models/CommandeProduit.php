<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\CommandeProduit
 *
 * @property integer $id
 * @property float $prix_unitaire_ht
 * @property integer $quantite
 * @property integer $produit_option_id
 * @property integer $taux_tva_id
 * @property integer $commande_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Commande $commande
 * @property-read \App\Models\TauxTVA $taux_tva
 * @property string $produit_libelle
 * @property string $option_libelle
 */
class CommandeProduit extends Model
{
    protected $table = 'commande_produits';

    protected $fillable = ['*'];

    //Relationships
    public function commande() {
        return $this->belongsTo('App\Models\Commande');
    }

    public function taux_tva() {
        return $this->belongsTo('App\Models\TauxTVA', 'taux_tva_id');
    }

}
