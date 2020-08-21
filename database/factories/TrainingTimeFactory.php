<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

// e.g. factory(App\TrainingTime::class, 50)->create()

$factory->define( \App\TrainingTime::class, function ( Faker $faker ) {
    return [
        'sports_id'   => 1,
        'hall_id'     => 1,
        'description' => $faker->sentence,
        'slots'       => rand( 1, 25 ),
        'date'        => \Carbon\Carbon::today()->addDays( rand( - 30, 30 ) ),
        'time'        => \Carbon\Carbon::createFromTime( rand( 0, 24 ), 0, 0 ),
    ];
} );
