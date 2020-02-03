<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 31/01/2020
 * Time: 08:45
 **/

namespace App\Models\Sdz;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'sdz_posts';

    protected $fillable = ['titre', 'contenu', 'user_id'];

    
    /* La méthode "user()" permet de trouver l'utilisateur auquel appartient (belongTo) l'article : */
    public function user()
    {
        return $this->belongsTo('App\Models\Sdz\User');
    }
}