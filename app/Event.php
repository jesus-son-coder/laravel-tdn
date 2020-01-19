<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'location', 'price', 'starts_at'];

    //protected $dates = ['starts_at'];

    protected $casts = [
        'starts_at' => 'datetime',
        'price' => 'real'
    ];

    protected $appends = [
        'fake_price'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];


    public function isFree()
    {
        return $this->price == 0;
    }

    public function getPriceAttribute($value)
    {
        return $value + 1;
    }

    public function getFakePriceAttribute()
    {
        return $this->attributes['price'] + 100;
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

}



