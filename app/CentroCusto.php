<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
     protected $fillable = [
        'nome',
        'descricao'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'centro_custos';
}
