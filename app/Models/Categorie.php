<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Categorie
 *
 * @property integer $id
 * @property string $nom
 * @property string $img_name
 * @property integer $ordre
 * @property string $slug
 * @property integer $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Categorie $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Categorie[] $children
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produit[] $produits
 */
class Categorie extends Model
{
    protected $table = 'catalogue';

    protected $fillable = ['*'];

    //Relationships
    public function parent() {
        return $this->belongsTo('App\Models\Categorie', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Models\Categorie', 'parent_id');
    }

    public function produits() {
        return $this->hasMany('App\Models\Produit');
    }
}
