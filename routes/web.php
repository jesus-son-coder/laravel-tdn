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
    /*
    App\Event::create([
            'name' => 'Cake PHP',
            'description' => 'The little performing Challenger',
            'location' => 'Berlin, DE',
            'price' => 90,
        ]
    ); */


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



Route::get('/events', function() {

    $events = [
      'Make PHP Great Again',
      'PHP Conference',
      'Meetup TDN',
      'Laravel Conference'
    ];

    return view('events/index',
        compact('events'));
});



