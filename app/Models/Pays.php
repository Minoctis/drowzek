<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Pays
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adresse[] $adresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $livraisonCommande
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $facturationCommande
 */
class Pays extends Model
{
    protected $table = 'pays';

    //Relationships
    public function adresses() {
        return $this->hasMany('App\Models\Adresse', 'pays_id');
    }

    public function livraisonCommande() {
        return $this->hasMany('App\Models\Commande', 'pays_livraison_id');
    }

    public function facturationCommande() {
        return $this->hasMany('App\Models\Commande', 'pays_facturation_id');
    }
}
