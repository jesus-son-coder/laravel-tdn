<?php
/**
 * Created by PhpStorm.
 * User: sekaherve
 * Date: 02/03/2019
 * Time: 13:00
 */

namespace App\Utilities;


class Date
{
    public static function isWeekend()
    {
        return (new \DateTime)->format('N') >= 6;
    }
}


