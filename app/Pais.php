<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';
    public $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nome', 'fk_continente_id', 'capital', 'area'];
    public $timestamps = false;
    protected $guarded = [];

    public function relContinente() {
        return $this->hasOne('App\Continente', 'id', 'fk_continente_id');
    }

    public function relPaisBandeira() {
        return $this->hasOne(PaisBandeira::class, 'fk_pais_id');
    }
}
