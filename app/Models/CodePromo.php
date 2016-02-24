<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\CodePromo
 *
 * @property integer $id
 * @property string $code
 * @property string $date_debut
 * @property string $date_fin
 * @property integer $valeur
 * @property integer $promotion_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\PromotionType $type
 */
class CodePromo extends Model
{
    protected $table = 'codes_promo';

    protected $fillable = ['code', 'date_debut', 'date_fin', 'valeur'];

    //Relationships
    public function type() {
        return $this->belongsTo('App\Models\PromotionType', 'promotion_type_id');
    }
}
