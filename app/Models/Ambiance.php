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

    public function getAllAmbiances() {
        $ambiances = Ambiance::all();
        $ambiances = $ambiances->toArray();
        foreach($ambiances as $index => $ambiance) {
            $images = AmbianceImage::where('ambiance_id', $ambiance['id'])->where('ordre', 1)->get();
            $images = $images->toArray();
            foreach($images as $row => $kk) {
                foreach($kk as $key => $value)
                $ambiances[$index]['image'][$key] = $value;
            }
//            $ambiances[$index]['image'] = $images;
        }

        return $ambiances;
    }

    public function getBySlug($slug) {
        $model = new Ambiance();
        $ambiance = $model->where('slug', $slug)->with('produits')->first();
        $ambiance = $ambiance->toArray();
        foreach($ambiance['produits'] as $key => $produit) {
            $optionModel = new ProduitOption();
            $option = $optionModel->where('produit_id', $produit['id'])->with('tauxTva')->orderBy('ordre', 'asc')->first();
            $option = $option->toArray();
            $ambiance['produits'][$key]['option'] = $option;
        }
        return $ambiance;
    }
}
