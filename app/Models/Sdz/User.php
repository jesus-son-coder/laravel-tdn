<?php

namespace App\Models\Sdz;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
// class User extends Model
// {
{
    protected $table = 'sdz_users';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Le Cryptage du mot de passe sera pris en charge par le module de création de compte :
     * dans la fonction "create()" de "RegisterController".
     * ----------------------------------------------------
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }*/


    public function posts()
    {
        /* Définit une relation "oneToMany" :*/
        return $this->hasMany('App\Models\Sdz\Post');
    }


}

