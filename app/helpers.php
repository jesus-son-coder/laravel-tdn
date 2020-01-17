<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 17/01/2020
 * Time: 09:20
 **/

if(!function_exists('format_price')) {
    function format_price($event) {
        if($event->isFree()) {
            return '<strong>GRATUIT</strong>';
        } else {
            // return sprintf("%d €", $event->price); // %d pour nombre entier
            return sprintf("%.2f €", $event->price); // %f pour nombre flottant (ou à virgule) avec ".2" pour le nombre de chiffres après la virgule.
        }
    }
}

