<?php

use Faker\Generator as Faker;

$factory->define(finance\Estado::class, function (Faker $faker) {
    return [
        'sigla'=>'AC',
        'descricao'=>'Acre'
    ];
});
