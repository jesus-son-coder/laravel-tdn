<?php

namespace App\Models\Sdz;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = 'sdz_auteurs';

    public function livres()
    {
        return $this->belongsToMany('App\Models\Sdz\Livre');
    }
}
