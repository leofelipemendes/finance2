<?php

use Faker\Generator as Faker;

$factory->define(finance\Municipio::class, function (Faker $faker) {
    return [
        'codigo' => 1,
        'nome' => 'Acre teste',
        'uf' => 'AC',
        'iduf' => 1
    ];
});
