<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $modelProduto = new Produto();
        $produtos = $modelProduto->all();
        return view('pages.produto.index',
        ['produtos' => $produtos]);
    }

    public function show($id)
    {

        // dd(Produto::find($id));
        return view(
            'pages.produto.single',
            ['produto' => Produto::find($id)]
        );
    }

    public function create()
    {
        return view('pages.produto.create');
    }

    public function store(Request $request)
    {
        $newProduto = $request->all();
        $newProduto['importado'] = ($request->importado) ? true : false;
        if (Produto::create($newProduto))
            return redirect('/produtos');
        else dd("Error ao criar produto!!");
    }

    public function edit($id)
    {
        return view('pages.produto.edit', ['produto' => Produto::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedProduto = $request->all();
        $updatedProduto['importado'] = $request->importado && true;
        // dd($updatedProduto);
        if (!Produto::find($id)->update($updatedProduto))
            dd("Erro ao atualizar produto $id!");
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.produto.delete',
            ['produto' => Produto::find($id)]
        );
    }

    public function remove(Request $request, $id)
    {
        //if(!Produto::find($id)->delete())
        if ($request->confirmar == 'Deletar')
            if (!Produto::destroy($id))
                dd("Error ao deletar produto $id.");
        return redirect('/produtos');
    }
}
