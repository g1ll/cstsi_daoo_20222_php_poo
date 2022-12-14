<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['nome','uf','codigouf','regiao_id'];

    public function regiao(){
        return $this->belongsTo(Regiao::class);
    }

    public function produtos(){
        return $this->hasManyThrough(Produto::class, Fornecedor::class);
    }
}
