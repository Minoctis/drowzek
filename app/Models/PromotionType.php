<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PromotionType
 *
 * @property integer $id
 * @property string $libelle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commande[] $commandes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CodePromo[] $codesPromo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reduction[] $reductions
 */
class PromotionType extends Model
{
    protected $table = 'promotion_type';

    //Relationships
    public function commandes() {
        return $this->hasMany('App\Models\Commande', 'code_promo_type');
    }

    public function codesPromo() {
        return $this->hasMany('App\Models\CodePromo', 'promotion_type_id');
    }

    public function reductions() {
        return $this->hasMany('App\Models\Reduction', 'promotion_type_id');
    }
}
