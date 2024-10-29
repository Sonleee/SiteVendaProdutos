<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'prod_nome', 'prod_quantidade', 'prod_descricao'];

    // Relacionamento com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cat_id');
    }
}
