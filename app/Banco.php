<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $fillable = [
        'codigo',
        'nome',
        'site'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'bancos';
}
