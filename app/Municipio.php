<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
class Municipio extends Model {

    Use SoftDeletes;
    
    protected $fillable = [
        'codigo',
        'nome',
        'uf',
        'iduf',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'municipios';
    
    public function estado() {
        return $this->belongsTo(Estado::class, 'iduf', 'id');
    }

}
