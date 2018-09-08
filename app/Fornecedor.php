<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nomefantasia'
        ,'razaosocial'
        ,'cnpj'
        ,'ie'
        ,'im' //inscricao municipal
        ,'matriz'
        ,'endereco'
        ,'bairro'
        ,'numero'
        ,'complemento'
        ,'idmunicipio'
        ,'iduf'
        ,'contato'
        ,'tel_contato'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'fornecedores';
    
    public function municipio() {
        return $this->hasOne(Municipio::class, 'idmunicipio', 'id');
    }
    
    public function estado() {
        return $this->hasOne(Estado::class, 'id', 'iduf');
    }
}
