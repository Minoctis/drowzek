<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $fillable = ['*'];
}
