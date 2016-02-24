<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\PaiementType
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $commandes
 */
class PaiementType extends Model
{
    protected $table = 'paiement_type';

    //Relationships
    public function commandes() {
        return $this->hasMany('App\Models\Commande', 'paiement_type_id');
    }
}
