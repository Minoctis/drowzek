<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\PanierType
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Panier[] $paniers
 */
class PanierType extends Model
{
    protected $table = 'panier_type';

    //Relationships
    public function paniers() {
        return $this->hasMany('App\Models\Panier', 'panier_type_id');
    }
}
