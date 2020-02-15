<?php

namespace App\Models\Sdz;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = 'sdz_livres';

    public function auteurs()
    {
        return $this->belongsToMany('App\Models\Sdz\Auteur');
    }

    public function editeur()
    {
        return $this->belongsTo('App\Models\Sdz\Editeur');
    }
}
