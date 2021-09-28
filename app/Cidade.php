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
}
