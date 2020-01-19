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
/*
    $event = Event::first();

    return $event;
*/
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
    $events = DB::table('events')->get();
    dump($events);

    // Récupérer que les données d'une seule colonne ("locations") de la table "events" :
    $locations = DB::table('events')->get(['location']);
    dump($locations);

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
    dump($events_sup_a_100);


    // Comparer des éléments Différents :
    $events_differents = DB::table('events')->where('price', '!=', 200)->get(['id', 'location as place']);
    dump($events_differents);


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




/* ****************************************** */
/*    QueryBuilder/Eloquent #4: Le Count()   */
/* ***************************************** */
Route::get('/querybuilder_count', function () {

    $nbre = DB::table('events')->where('price', '>', 70)->count();
    dump($nbre);
    die();

    return view('events/index');
});



/* ***************************************************** */
/*    QueryBuilder/Eloquent #5: Insertion de données :   */
/* ***************************************************** */
Route::get('/querybuilder_insert_data', function () {

    DB::table('events')->insert([
        [
            'name' => 'MySQL',
            'description' => 'Devenez expert en gestion de base de données',
            'location' => 'New York, US',
            'price' => 150
        ],
        [
            'name' => 'Angular JS',
            'description' => 'Le framework moderne JS',
            'location' => 'Sydney, Australia',
            'price' => 120
        ]
    ]);

    die('L\'insertion a fonctionné avec succès !');
    return view('events/index');
});



/* ***************************************************** */
/*    QueryBuilder/Eloquent #6: Update d'un élément  :   */
/* ***************************************************** */
Route::get('/querybuilder_update_one_data', function () {

    DB::table('events')->whereId(7)->update([
        'name' => 'MySQL5',
        'price' => 155
    ]);

    die('La modification a fonctionné avec succès !');
    return view('events/index');
});



/* ********************************************************** */
/*    QueryBuilder/Eloquent #7: Suppression d'un élément  :   */
/* ********************************************************** */
Route::get('/querybuilder_delete_data', function () {

    DB::table('events')->where('id', '=', 7)->delete();

    die('La suppression a fonctionné avec succès !');
    return view('events/index');
});



/* *************************************************************************************************************** */
/*                                             TRAVAILLER AVEC DES MODELS                                          */
/* *************************************************************************************************************** */


/* **************************************************** */
/*    Eloquent/Models #1: Sélectionner un élément  :   */
/* *************************************************** */
Route::get('/eloquent_model_select_data', function () {
    // Avec le QueryBuilder :
    $event_from_queryBuilder = DB::table('events')->find(7);
    dump($event_from_queryBuilder);

    // Avec le Model et l'objet 'Event' :
    $event_from_Model = App\Event::find(7);
    // Sélectionner tout l'objet :
    dump($event_from_Model);

    // Sélectionner un champ de l'objet :
    dump($event_from_Model->description);

    die();
    return view('events/index');
});



/* ************************************************************************ */
/*    Eloquent/Models #2: Enregistment de données en base - Méthode #1  :   */
/* ************************************************************************ */
Route::get('/eloquent_model_insert_data', function () {

    $event = new App\Event();

    $event->name = 'React JS';
    $event->description = "Le framework surpuissant JS";
    $event->location = 'Dallas TX, US';
    $event->price = 210;

    $event->save();

    die("L'enregistrement avec le Model a fonctionné avec succès !");
    return view('events/index');
});



/* ************************************************************************ */
/*    Eloquent/Models #3: Enregistment de données en base - Méthode #2  :   */
/* ************************************************************************ */
Route::get('/eloquent_model_insert_data_2', function () {

    $event = new Event([
        'name' => "Management de Projet",
        'description' => "Devenez Chef de projet",
        'location' => "Bruxelles, BE",
        'price' => 130
    ]);

    /* Avec cette méthode, il est IMPERATIF de déclarer l'attribut "filliable" dans le model 'Event' : */
    $event->save();

    die("L'enregistrement avec le Model a fonctionné avec succès !");
    return view('events/index');
});



/* ************************************************************************ */
/*    Eloquent/Models #4: Enregistment de données en base - Méthode #3  :   */
/* ************************************************************************ */
Route::get('/eloquent_model_insert_data_3', function () {

    $event = Event::create([
        'name' => "Linux",
        'description' => "Ingénieur Système Unix",
        'location' => "Toronto, CA",
        'price' => 250
    ]);

    $event->save();

    die("L'enregistrement avec le Model a fonctionné avec succès !");
    return view('events/index');
});





/* ******************************************************** */
/*    Eloquent/Models #5: Récupérer des enregistrements :   */
/* ******************************************************** */
Route::get('/eloquent_model_get_data', function () {

    // Méthode #1 :
    $allEvents_1 = App\Event::all();
    dump($allEvents_1);

    // Méthode #2 :
    $event = new Event();
    $allEvents_2 = $event->all();
    dump($allEvents_2);

    die();
    return view('events/index');
});



/* ************************************************************************ */
/*    Les Helpers  :   */
/* ************************************************************************ */
Route::get('/helpers_1', function () {

    Event::destroy([4]);

});


