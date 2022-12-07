<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Products extends Component
{
    public $produtos;
    public $orderAsc=true;

    public function render()
    {
        return view('livewire.products');
    }

    public function orderBy($column='id')
    {
        $this->produtos = Produto::orderBy($column, $this->orderAsc ? 'asc' : 'desc')->get();
        $this->orderAsc = !$this->orderAsc;
    }

    public function orderByName(){
        $this->orderBy('nome');
    }
    
    public function orderByPrice()
    {
        $this->orderBy('preco');
    }
}
