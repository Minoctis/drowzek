<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Commande
 *
 * @property integer $id
 * @property string $reference
 * @property string $date
 * @property string $adresse_facturation
 * @property string $compl_adresse_facturation
 * @property string $cp_facturation
 * @property string $ville_facturation
 * @property string $telephone_facturation
 * @property string $prenom_livraison
 * @property string $nom_livraison
 * @property string $societe_livraison
 * @property string $adresse_livraison
 * @property string $compl_adresse_livraison
 * @property string $cp_livraison
 * @property string $ville_livraison
 * @property string $telephone_livraison
 * @property float $frais_de_port
 * @property string $code_promo_libelle
 * @property float $code_promo_valeur
 * @property integer $code_promo_type_id
 * @property integer $pays_id_livraison
 * @property integer $pays_id_facturation
 * @property integer $paiement_type_id
 * @property integer $client_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $pays_livraison_id
 * @property integer $pays_facturation_id
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Pays $paysLivraison
 * @property-read \App\Models\Pays $paysFacturation
 * @property-read \App\Models\PaiementType $paiementType
 * @property-read \App\Models\PromotionType $promotionType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommandeProduit[] $produits
 * @property integer $commande_statut_id
 * @property-read \App\Models\CommandeStatut $statut
 */
class Commande extends Model
{
    protected $table = 'commandes';

    protected $fillable = ['*'];

    //Relationships
    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function paysLivraison() {
        return $this->belongsTo('App\Models\Pays', 'pays_livraison_id');
    }

    public function paysFacturation() {
        return $this->belongsTo('App\Models\Pays', 'pays_facturation_id');
    }

    public function paiementType() {
        return $this->belongsTo('App\Models\PaiementType', 'paiement_type_id');
    }

    public function promotionType() {
        return $this->belongsTo('App\Models\PromotionType', 'code_promo_type_id');
    }

    public function produits() {
        return $this->hasMany('App\Models\CommandeProduit');
    }

    public function statut() {
        return $this->belongsTo('App\Models\CommandeStatut', 'commande_statut_id');
    }

//    public function produitsImages()
//    {
//        return $this->hasManyThrough('App\Models\ProduitImage', 'App\Models\CommandeProduit', 'commande_id', 'produit_id');
//    }
}
