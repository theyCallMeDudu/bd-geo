<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    public $primaryKey = 'id';
    protected $fillable = ['nome', 'fk_pais_id', 'area', 'fundacao'];
    public $incrementing = true;
    public $timestamps = false;

    public function relPais() {
        return $this->hasOne('App\Pais', 'id', 'fk_pais_id');
    }

    public function relCidadePostal() {
        return $this->hasOne(CidadePostal::class, 'fk_cidade_id');
    }
}
