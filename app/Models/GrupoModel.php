<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoModel extends Model
{
    protected $table = "grupo";

    // protected $fillable = [
    //     'id',
    //     'codigo',
    //     'nome',
    //     'ativo'
    // ];

    // protected $cast = [
    //     'date' => 'Timestamp'
    // ];

    public $timestamps = false;

    // public function produtos()
    // {
    //     return $this->hasMany(Produto::class, 'grupo_id', 'id');
    // }
}