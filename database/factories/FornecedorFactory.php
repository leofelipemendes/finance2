<?php

use Faker\Generator as Faker;

$factory->define(finance\Fornecedor::class, function (Faker $faker) {
    return [
         'nomefantasia' => $faker->company
        ,'razaosocial' => $faker->company
        ,'cnpj' => $faker->numberBetween(11111111111111,99999999999999)
        ,'ie' => $faker->numberBetween(111111111111,999999999999)
        ,'im' => $faker->numberBetween(11111111,99999999)//inscricao municipal
        ,'matriz' => $faker->boolean()
        ,'endereco' => $faker->streetAddress
        ,'bairro' => $faker->address
        ,'numero' => $faker->numerify()
        ,'complemento' => $faker->colorName
        ,'idmunicipio' => 1
        ,'iduf' => 22
        ,'contato' =>$faker->name
        ,'tel_contato'=>$faker->phoneNumber
    ];
});
