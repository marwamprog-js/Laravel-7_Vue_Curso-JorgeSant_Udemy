<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //Serve para não deletar dados da tabela. Apenas faz o controle por campo
    use SoftDeletes;

    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() {
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
        // return $this->hasMany('App\Item');
    }
}
