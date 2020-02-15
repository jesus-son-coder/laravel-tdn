<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Sdz\Editeur::class, function(Faker\Generator $faker) {
    return [
        'nom' => $faker->name,
    ];
});

$factory->define(App\Models\Sdz\Auteur::class, function(Faker\Generator $faker) {
    return [
        'nom' => $faker->name,
    ];
});

$factory->define(App\Models\Sdz\Livre::class, function(Faker\Generator $faker) {
    return [
        'titre' => $faker->sentence(),
        'description' => $faker->text,
        'editeur_id' => $faker->numberBetween(1, 40),
    ];
});



/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/
