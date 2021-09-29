<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CidadePostal extends Model
{
    protected $table = 'cidade_postais';
    public $primaryKey = 'id';
    protected $fillable = ['nome', 'fk_cidade_id'];
    public $incrementing = true;
    public $timestamps = false;

    public function relCidade() {
        return $this->belongsTo(Cidade::class, 'fk_cidade_id');
    }
}
