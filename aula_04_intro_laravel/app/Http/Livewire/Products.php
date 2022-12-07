<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Products extends Component
{
    public $produtos;
    public $orderAsc = true;
    public $orderColumn = 'id';

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

    public function orderBy($column = 'id')
    {
        $this->orderColumn = $column;
        $this->produtos = Produto::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->get();
        $this->orderAsc = !$this->orderAsc;
        //debugando variavel na saida do servidor
        Log::channel('stderr')->info($this->orderAsc?'asc':'desc');
    }

    public function orderByName()
    {
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

        try {
            Produto::create($produto);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        } catch (Exception $e) {
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

    public function remove($id)
    {
        if (!Produto::destroy($id))
            return "Erro!";
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }

    public function update($id)
    {

        $produto= [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'qtd_estoque' => $this->quantidade,
            'importado' => $this->importado
        ];
        Produto::findOrFail($id)->update($produto);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }
}
