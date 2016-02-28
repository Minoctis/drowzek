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

//$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Models\Adresse::class, function (Faker\Generator $faker) {
    $faker = Faker::create('fr_FR');

    return [
        'nom_carnet_adresse' => $faker->words(3),
        'adresse'            => $faker->streetAddress,
        'compl_adresse'      => $faker->optional(0.2, null)->secondaryAddress,
        'cp'                 => $faker->postcode,
        'ville'              => $faker->city,
        'nom_livraison'      => $faker->lastName,
        'prenom_livraison'   => $faker->firstName,
    ];
});