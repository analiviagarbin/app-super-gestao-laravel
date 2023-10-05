<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos(){
        // model do relacionamento nxn  tabela auxiliar (registros de relacionamento)
        // nome da fk da tabela mapeada
        return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
}
