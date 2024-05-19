<?php

namespace App\Http\Livewire;

use App\Models\Fornecedor;
use App\Models\Produto;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Products extends Component
{
    public $produto;
    public $listFornecedores;
    public $listProdutos;
    public $orderAsc = true;
    public $orderColumn = 'id';



    public function mount()
    {
        $this->getFornecedores();
    }

    public function render()
    {
        return view('components.live.products');
    }

    public function orderBy($column = 'id')
    {
        $this->orderColumn = $column;
        $this->listProdutos = Produto::orderBy(
            $this->orderColumn,
            $this->orderAsc ? 'asc' : 'desc'
        )->limit(10)->get();
        // $this->orderAsc = !$this->orderAsc;
        //debugando variavel na saida do servidor
        $this->log($this->orderAsc?'asc':'desc');
    }

    public function getFornecedores(){
        foreach(Fornecedor::all()->pluck('nome','id') as $id=>$nome)
            $this->listFornecedores[]=["id"=>$id,'nome'=>$nome];
    }

    public function save()
    {
        $novoProduto = $this->produto;
        $novoProduto['qtd_estoque'] = $this->produto['qtdEstoque'];
        $novoProduto['fornecedor_id'] = $this->produto['fornecedor'];
        try {
            Produto::create($novoProduto);
            $this->log(['saved',$novoProduto]);
            $this->clear();
            $this->orderAsc = false;
            $this->orderBy();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function clear()
    {
        $this->produto = [];
    }

    public function remove($id)
    {
        if (!Produto::destroy($id))
            return "Erro!";
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
    }

    public function update($updatedProduto)
    {
        $this->produto = $updatedProduto;
        $this->log(['updated',$this->produto]);
        Produto::findOrFail($this->produto['id'])->update($this->produto);
        $this->orderAsc = !$this->orderAsc;
        $this->orderBy($this->orderColumn);
        $this->clear();
    }

    private function log($var){
        Log::channel('stderr')->info(print_r($var,true));
    }
}
