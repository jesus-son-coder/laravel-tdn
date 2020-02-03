<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 27/01/2020
 * Time: 17:13
 **/

namespace App\Http\Requests\Sdz;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:sdz_users',
            'email' => 'required|email|max:255|unique:sdz_users',
            'password' => 'required|confirmed|min:6'
        ];
    }
}