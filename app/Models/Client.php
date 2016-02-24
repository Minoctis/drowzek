<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['prenom', 'nom', 'email', 'date_naissance'];

    protected $hidden = ['password', 'token_forget_password'];
}
