<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommandeStatut
 *
 * @property integer $id
 * @property string $libelle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $commandes
 */
class CommandeStatut extends Model
{
    protected $table = 'commande_statut';

    //Relationships
    public function commandes() {
        return $this->hasMany('App\Models\Commande', 'commande_statut_id');
    }
}
