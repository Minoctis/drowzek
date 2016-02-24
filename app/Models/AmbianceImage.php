<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\AmbianceImage
 *
 * @property integer $id
 * @property string $img_name
 * @property integer $ordre
 * @property integer $ambiance_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Ambiance $ambiance
 */
class AmbianceImage extends Model
{
    protected $table = 'ambiances_img';

    protected $fillable = ['*']; //champs remplis côté serveur

    //Relationships
    public function ambiance() {
       return $this->belongsTo('App\Models\Ambiance');
    }
}
