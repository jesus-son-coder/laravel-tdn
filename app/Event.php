<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'location', 'price', 'starts_at'];

    protected $dates = ['starts_at'];

    public function isFree()
    {
        return $this->price == 0;
    }
}



