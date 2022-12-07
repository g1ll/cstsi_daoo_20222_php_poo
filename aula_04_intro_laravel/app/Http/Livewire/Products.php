<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Exception;
use Livewire\Component;

class Products extends Component
{
    public $produtos;
    public $orderAsc=true;

    public $nome;
    public $descricao;
    public $quantidade;
    public $preco;
    public $importado;
    public $idprod;


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

    public function save()
    {
        $produto = [
            "nome" => $this->nome,
            "descricao" => $this->descricao,
            "preco" => $this->preco,
            "qtd_estoque" => $this->quantidade,
            "importado" => $this->importado ? true : false,
        ];

        // dd($produto);

        try{
            Produto::create($produto);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        }catch(Exception $e){
            dd('Erro ao inserir');
        }
    }

    private function clear()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->preco = 0;
        $this->quantidade = 0;
        $this->importado = null;
    }
}
