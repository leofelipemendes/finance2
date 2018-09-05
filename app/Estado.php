<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'sigla',
        'descricao'
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'estados';
    
    public function municipios() {
        return $this->hasMany(Municipio::class,'iduf','id');
    }
}
