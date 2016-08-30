<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'theme';

    protected $fillable = ['titre', 'type', 'image_url', 'lien'];

}
