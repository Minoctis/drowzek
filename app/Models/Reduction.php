<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reduction
 *
 * @property integer $id
 * @property string $date_debut
 * @property string $date_fin
 * @property float $valeur
 * @property integer $promotion_type_id
 * @property integer $reduction_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\ReductionType $typeReduction
 * @property-read \App\Models\PromotionType $typePromo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Produit[] $produits
 */
class Reduction extends Model
{
    protected $table = 'reductions';

    protected $fillable = ['date_debut', 'date_fin', 'valeur'];

    //Relationships
    public function typeReduction() {
        return $this->belongsTo('App\Models\ReductionType', 'reduction_type_id');
    }

    public function typePromo() {
        return $this->belongsTo('App\Models\PromotionType', 'promotion_type_id');
    }

    public function produits() {
        return $this->hasMany('App\Models\Produit');
    }
}
