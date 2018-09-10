<?php

use Faker\Generator as Faker;

$factory->define(finance\Fornecedor::class, function (Faker $faker) {
    return [
         'nomefantasia' => $faker->company
        ,'razaosocial' => $faker->company
        ,'cnpj' => $faker->numberBetween($min = 1000, $max = 9000)
        ,'ie' => $faker->numberBetween($min = 1000, $max = 9000)
        ,'im' => $faker->numberBetween($min = 1000, $max = 9000)
        ,'matriz' => $faker->boolean()
        ,'endereco' => $faker->streetAddress
        ,'bairro' => $faker->address
        ,'numero' => $faker->numerify()
        ,'complemento' => $faker->colorName
        ,'idmunicipio' => 53
        ,'iduf' => 1
        ,'contato' =>$faker->name
        ,'tel_contato'=>$faker->phoneNumber
    ];
});
