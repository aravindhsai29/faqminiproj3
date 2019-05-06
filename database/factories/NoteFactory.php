<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

//use App\Model;
use App\Note;
use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
