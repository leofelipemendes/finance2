<?php

use Illuminate\Database\Seeder;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(finance\Municipio::class)->create();
    }
}
