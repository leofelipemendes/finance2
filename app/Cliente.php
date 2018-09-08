<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome'
        ,'rg'
        ,'cpf'
        ,'endereco'
        ,'bairro'
        ,'numero'
        ,'complemento'
        ,'idcidade'
        ,'iduf'
        ,'ddd_res'
        ,'tel_res'
        ,'ddd_cel'
        ,'tel_cel'
        ,'ddd_out'
        ,'tel_out'
        ,'contato'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'clientes';
}
