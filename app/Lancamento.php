<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Lancamento extends Model {

    use SoftDeletes;
    protected $fillable = [
        'descricao'
        , 'data_competencia'
        , 'data_vencimento'
        , 'valor'
        , 'idfornecedor'
        , 'idcliente'
        , 'idcategoria'
        , 'idconta'
        , 'idcentrocusto'
    ];
    protected $guarded = ['id', 'created_at', 'update_at','deleted_at'];
    protected $table = 'lancamentos';

}
