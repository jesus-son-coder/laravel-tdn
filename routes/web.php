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


/* ********************************************** */
/* Utilisation du QueryBuilder avec Eloquent #1:  */
/* ********************************************** */
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




/* ********************************************** */
/*    QueryBuilder/Eloquent #2: clause Where()    */
/* ********************************************** */
Route::get('/querybuilder_where', function () {

    // Supérieur à :
    $events_sup_a_100 = DB::table('events')->where('price', '>', 100)->get(['id', 'location as place']);
    // dump($events_sup_a_100);


    // Comparer des éléments Différents :
    $events_differents = DB::table('events')->where('price', '!=', 200)->get(['id', 'location as place']);
    // dump($events_differents);


    // Tester l'égalité - méthode #1 :
    $events_70 = DB::table('events')->where('price', '=', 90)->get(['id', 'location as place']);
    dump($events_70);

    // Tester l'égalité - méthode #2 :
    $events_70 = DB::table('events')->where('price', 90)->get(['id', 'location as place']);
    dump($events_70);

    die();

    return view('events/index');
});




/* *************************************************** */
/*    QueryBuilder/Eloquent #3: Le Where() dynamique   */
/* *************************************************** */
Route::get('/querybuilder_where_dynamique', function () {

    $event1 = DB::table('events')->whereName('Cake PHP')->get();
    dump($event1);

    // Combiner deux critères :
    $event2 = DB::table('events')->whereNameAndPrice('Cake PHP', 90)->get(['location']);
    dump($event2);


    // Utilisation du mot de liaison "Or" :
    $event3 = DB::table('events')->whereNameOrPrice('Cake PHP', 200)->get();
    dump($event3);

    // Utilisation du mot de liaison "orWhere" :
    $event4 = DB::table('events')
        ->where('name', 'Cake PHP')
        ->orWhere('price', 200)
        ->get();

    dump($event4);


    // Utilisation de Where avec la liaison "ET" :
    $event5 = DB::table('events')
        ->where('name', 'Cake PHP')
        ->where('price', 90)
        ->get();
    dump($event5);


    die();

    return view('events/index');
});