<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return
    [
        'nombre'            => $faker->name,
        'correo'            => $faker->unique()->safeEmail,
        'fecha_nacimiento'  => $faker->dateTimeBetween($startDate = '-50 years', $endDate = '-30 years')
    ];
});
