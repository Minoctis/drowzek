<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Produit
 *
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $dimensions
 * @property string $slug
 * @property integer $categorie_id
 * @property integer $ambiance_id
 * @property integer $reduction_id
 * @property integer $is_new
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProduitImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProduitAssocie[] $produitsAssocies
 * @property-read \App\Models\Categorie $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ambiance[] $ambiances
 * @property-read \App\Models\Reduction $reduction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProduitOption[] $options
 */
class Produit extends Model
{
    use SoftDeletes;
    
    protected $table = 'produits';

    protected $fillable = ['nom', 'description', 'dimensions'];

    protected $dates = ['deleted_at'];

    //Relationships
    public function images() {
        return $this->hasMany('App\Models\ProduitImage');
    }

    //TODO : modifier code pour éviter les données récursives et gérer indifféremment le produit 1 et le produit 2
    public function produitsAssocies() {
        return $this->hasMany('App\Models\ProduitAssocie', 'produit_1');
    }

    public function categorie() {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function ambiances() {
        return $this->belongsToMany('App\Models\Ambiance', 'ambiances_has_produits', 'produit_id', 'ambiance_id');
    }

    public function reduction() {
        return $this->hasOne('App\Models\Reduction');
    }

    public function options() {
        return $this->hasMany('App\Models\ProduitOption');
    }
}
