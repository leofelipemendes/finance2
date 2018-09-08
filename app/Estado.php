<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;
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
