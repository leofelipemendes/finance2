<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model {

    protected $fillable = [
        'descricao',
        'idbanco',
        'agencia',
        'dig_ag',
        'nr_conta',
        'dig_conta',
        'tipo_conta',
        'ativo'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'contas_bancarias';

}
