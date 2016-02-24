<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Civilite
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Client[] $clients
 */
class Civilite extends Model
{
    protected $table = 'civilites';

    //relationships
    public function clients() {
        return $this->hasMany('App\Models\Client');
    }
}
