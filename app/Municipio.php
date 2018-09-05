<?php

namespace finance;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {

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
