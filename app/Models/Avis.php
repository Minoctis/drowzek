<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    
    protected $fillable = ['titre', 'texte', 'produit_id'];
    
    public function produit() {
        return $this->belongsTo('App\Model\Produit');
    }
}
