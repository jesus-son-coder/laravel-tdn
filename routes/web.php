<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Event;

Route::get('/', function () {

    $events = Event::all();
    return view('events/index')->withEvents($events);

});


Route::get('/about', function () {
    $name = 'Seka Hervé';

    return view('pages/about', compact('name'));
});

Route::get('/help', function() {

    return view('pages/help')
        ->withFirstName('Hervé')
        ->withLastName('Seka') ;

});


Route::get('/herve', function () {

    $first_name = 'Hervé';
    $last_name = 'Seka';
    $function = 'developer';

    return view('pages/herve', compact('first_name','last_name', 'function'));
});


Route::get('/events', function() {

    $events = [
      'Make PHP Great Again',
      'PHP Conference',
      'Meetup TDN',
      'Laravel Conference'
    ];

    // $events = Event::all();

    return view('events/index',
        compact('events'));
});



Route::get('/test1', function () {
    // dd(DB::select('SELECT * from events'));
    $event = DB::select('SELECT * from events')[0];
    dump($event);
    dump($event->location);
    die();
    return view('events/index');

});


/* ******************************************* */
/* Utilisation du QueryBuilder avec Eloquent : */
/* ******************************************* */
Route::get('/querybuilder_test1', function () {
    // dump( DB::table('events')->get());
    // $events = DB::table('events')->get();

    // Récupérer que les données d'une seule colonne ("locations") de la table "events" :
    $locations = DB::table('events')->get(['location']);
    // dump($locations);

    // Récupérer le premier élément d'une liste :
    $first_location = DB::table('events')->get(['location'])->first();

    // Renommer le champ "location" avec "place" dans le résultat obtenu :
    $first_location = DB::table('events')->get(['location as place'])->first();
    dump($first_location);

    die();

    return view('events/index');
});

