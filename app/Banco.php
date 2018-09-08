<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'codigo',
        'nome',
        'site'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'bancos';
}
