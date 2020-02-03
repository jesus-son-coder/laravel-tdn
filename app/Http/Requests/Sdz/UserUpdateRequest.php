<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 27/01/2020
 * Time: 17:13
 **/

namespace App\Http\Requests\Sdz;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->user;
        return [
            'name' => 'required|max:255|unique:sdz_users' . $id,
            'email' => 'required|email|max:255|unique:sdz_users,email' . $id
        ];
    }
}