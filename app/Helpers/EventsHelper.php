<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 17/01/2020
 * Time: 17:55
 **/

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;

class EventsHelper
{
    public static function formatPrice(Event $event) {
        if($event->isFree()) {
            return '<strong>GRATUIT</strong>';
        } else {
            // return sprintf("%d €", $event->price); // %d pour nombre entier
            return sprintf("%.2f €", $event->price); // %f pour nombre flottant (ou à virgule) avec ".2" pour le nombre de chiffres après la virgule.
        }
    }

    public static function formatDate(Carbon $date) {
        return $date->format('d/m/Y H:i');
    }
}