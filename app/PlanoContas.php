<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class PlanoContas extends Model
{
    protected $fillable = ['codigo','descricao','ativo'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'plano_contas';
}
