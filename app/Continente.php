<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = 'continentes';
    public $primaryKey = 'id';
    protected $fillable = ['nome'];
    public $incrementing = true;
    public $timestamps = false;
}
