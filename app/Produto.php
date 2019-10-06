<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id', 'nome', 'precocompra', 'precovenda', 'datavencimento', 'qtdmin', 'qtdmax', 'descricao', 'isactive'
    ];
}
