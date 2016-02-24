<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Adresse
 *
 * @property integer $id
 * @property string $nom_carnet_adresse
 * @property string $adresse
 * @property string $compl_adresse
 * @property string $societe
 * @property string $cp
 * @property string $ville
 * @property string $nom_livraison
 * @property string $prenom_livraison
 * @property string $telephone
 * @property integer $client_id
 * @property integer $adresse_type_id
 * @property integer $pays_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\AdresseType $adresseType
 * @property-read \App\Models\Pays $pays
 */
class Adresse extends Model
{
    protected $table = 'adresses';
    protected $fillable = ['*']; //Tous les champs sont remplis côté serveur, pas de risque d'exploit

    //Relationships
    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function adresseType() {
        return $this->hasOne('App\Models\AdresseType', 'adresse_type_id');
    }

    public function pays() {
        return $this->belongsTo('App\Models\Pays');
    }
}
