<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaisBandeira extends Model
{
    protected $table = 'pais_bandeiras';
    public $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nome', 'fk_pais_id'];
    public $timestamps = false;

    public function relPais() {
        return $this->belongsTo(Pais::class, 'fk_pais_id');
    }
}
