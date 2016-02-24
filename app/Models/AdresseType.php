<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\AdresseType
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adresse[] $adresses
 */
class AdresseType extends Model
{
    protected $table = 'adresse_type';

    //Relationships
    public function adresses() {
        return $this->hasMany('App\Models\Adresse', 'adresse_type_id');
    }
}
