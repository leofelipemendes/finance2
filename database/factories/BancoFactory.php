<?php

use Faker\Generator as Faker;

$factory->define(finance\Banco::class, function (Faker $faker) {
    return [
        'codigo' => 237,
        'nome' =>'Bradesco',
        'site'=> 'banco.bradesco.com.br'
    ];
});
