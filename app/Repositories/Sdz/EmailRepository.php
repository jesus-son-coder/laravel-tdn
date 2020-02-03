<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 29/01/2020
 * Time: 09:12
 **/

namespace App\Repositories\Sdz;

use App\Models\Sdz\Email;

class EmailRepository implements EmailRepositoryInterface
{
    protected $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function save($mail)
    {
        $this->email->email = $mail;
        $this->email->save();
    }
}