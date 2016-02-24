<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReductionType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reduction[] $reductions
 */
class ReductionType extends Model
{
    protected $table = 'reductions_type';

    //Relationships
    public function reductions() {
        return $this->hasMany('App\Models\Reduction');
    }
}
