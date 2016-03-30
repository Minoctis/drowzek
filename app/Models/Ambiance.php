<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Ambiance
 *
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property integer $ordre
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produit[] $produits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AmbianceImage[] $images
 */
class Ambiance extends Model
{
    protected $table = 'ambiances';

    protected $fillable = ['nom', 'description', 'ordre', 'slug'];

    //Relationships
    public function produits() {
        return $this->belongsToMany('App\Models\Produit', 'ambiances_has_produits', 'ambiance_id', 'produit_id');
    }

    public function images() {
        return $this->hasMany('App\Models\AmbianceImage');
    }

    //Methods

    public function getBySlug($slug) {
        $ambiance = Ambiance::where('slug', $slug)->first();

        return $ambiance;
    }
}
