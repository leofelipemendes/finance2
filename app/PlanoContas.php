<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class PlanoContas extends Model
{
    use SoftDeletes;
    protected $fillable = ['codigo','descricao','ativo'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'plano_contas';
}
