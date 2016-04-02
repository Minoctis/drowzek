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
    protected $table = 'categories';

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

    //Methods

    public function getBySlug($slug) {
        //get categorie with produits
        $categorie = Categorie::where('slug', $slug)->with('produits')->first();
        $categorie = $categorie->toArray();
        //add options for each produit
        foreach($categorie['produits'] as $key => $produit) {
            $optionModel = new ProduitOption();
            $option = $optionModel->where('produit_id', $produit['id'])->with('tauxTva')->orderBy('ordre', 'asc')->first();
            $option = $option->toArray();
            $categorie['produits'][$key]['option'] = $option;
        }
        //add parent categorie if exists
        if(isset($categorie['parent_id'])) {
            $parent = Categorie::find($categorie['parent_id']);
            $parent = $parent->toArray();
            $categorie['parent'] = $parent;
        }
        return $categorie;
    }
}