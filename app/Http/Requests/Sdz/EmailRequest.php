<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 27/01/2020
 * Time: 17:13
 **/

namespace App\Http\Requests\Sdz;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [ 'email' => 'required|email|unique:sdz_emails' ];
    }
}