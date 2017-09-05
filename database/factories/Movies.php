<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
		'director' => $faker->name,
		'imageURL' => $faker->imageUrl,
		'duration'=> $faker->randomNumber,
		'releaseDate'=> $faker->date,
		'genres'=> [ 'name' => $faker->word ],
    ];
});