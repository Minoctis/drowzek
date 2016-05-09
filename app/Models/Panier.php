<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Panier
 *
 * @property integer $id
 * @property string $date_creation
 * @property integer $client_id
 * @property integer $panier_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\PanierType $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProduitOption[] $produits
 */
class Panier extends Model
{
    protected $table = 'paniers';
    protected $fillable = ['client_id', 'panier_type_id', 'ip'];

    //Relationships
    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function type() {
        return $this->belongsTo('App\Models\PanierType', 'panier_type_id');
    }

    public function produits() {
        return $this->belongsToMany('App\Models\ProduitOption', 'paniers_has_produits', 'panier_id', 'produit_option_id');
    }
}
