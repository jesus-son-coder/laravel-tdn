<?php

namespace App\Models\Sdz;

use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
  protected $table = 'sdz_editeurs';


  public function livres()
  {
    return $this->hasMany('App\Models\Sdz\Livre');
  }
}
