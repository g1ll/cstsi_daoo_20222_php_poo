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
        // return response()->json($produtos);
        return view('produtos', ['produtos' => $produtos]);
    }

    public function show($id)
    {

        // dd(Produto::find($id));
        return view(
            'produto_single',
            ['produto' => Produto::find($id)]
        );
    }

    public function create()
    {
        return view('produto_create');
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
        return view('produto_edit', ['produto' => Produto::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updatedProduto = $request->all();
        $updatedProduto['importado'] = $request->importado && true;
        // dd($updatedProduto);
        if (!Produto::find($id)->update($updatedProduto))
            dd("Erro ao atualizar produto $id!");
        return redirect('/produtos');
    }

    public function delete($id)
    {
        return view(
            '/produto_delete',
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
