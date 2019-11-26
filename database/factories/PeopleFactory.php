<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'ci'=> substr($faker->sentence(2),0,-1),
        'nombre'=> substr($faker->sentence(2),0,-1),
        'apellido'=>$faker->sentence(2),
        'long_description'=> $faker->text,
        'telefono'=> substr($faker->sentence(2),0,-1),
        'fecha_nacimiento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'category_id' => $faker->numberBetween(1,5)
    ];
});
