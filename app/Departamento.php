<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'descricao'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'departamentos';
}
