<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 04/02/2020
 * Time: 00:02
 **/

namespace App\Models\Sdz;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $table = 'sdz_tags';

    protected $fillable = ['tag', 'tag_url'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Sdz\Post', 'sdz_post_tag');
    }
}