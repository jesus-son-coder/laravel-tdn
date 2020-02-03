<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 27/01/2020
 * Time: 13:41
 **/

namespace App\Repositories\Sdz;

use App\Models\Sdz\User;

class UserRepository extends ResourceRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    
}