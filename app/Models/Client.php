<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Client
 *
 * @property integer $id
 * @property string $prenom
 * @property string $nom
 * @property string $email
 * @property string $password
 * @property string $date_inscription
 * @property string $date_naissance
 * @property string $token_forget_password
 * @property integer $civilite_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adresse[] $adresses
 * @property-read \App\Models\Civilite $civilite
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $commandes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Panier[] $paniers
 */
class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['prenom', 'nom', 'email', 'date_naissance'];

    protected $hidden = ['password', 'token_forget_password'];

    //Relationships
    public function adresses() {
        return $this->hasMany('App\Models\Adresse');
    }

    public function civilite() {
        return $this->belongsTo('App\Models\Civilite');
    }

    public function commandes() {
        return $this->hasMany('App\Models\Commande');
    }

    public function paniers() {
        return $this->hasMany('App\Models\Panier');
    }
}
