<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model {

    protected $fillable = [
        'codigo',
        'nome',
        'uf',
        'iduf',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'municipios';

}
