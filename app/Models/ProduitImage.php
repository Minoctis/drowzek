<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProduitImage
 *
 * @property integer $id
 * @property string $img_name
 * @property integer $ordre
 * @property integer $produit_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Produit $produit
 */
class ProduitImage extends Model
{
    protected $table = 'produits_img';

    //Relationships
    public function produit() {
        return $this->belongsTo('App\Models\Produit');
    }
}
