<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $modelProduto = new Produto();
        return view('pages.produto.index',
        ['produtos' => $modelProduto->paginate(15)]);
    }

    public function show($id)
    {
        return view(
            'pages.produto.single',
            ['produto' => Produto::find($id)]
        );
    }

    public function create()
    {
        return view('pages.produto.create',
            ['fornecedores'=>Fornecedor::all()]
        );
    }

    public function store(Request $request)
    {
        if ($request->has('confirmar')){
            $newProduto = $request->all();
            $newProduto['importado'] = $request->has('importado');
            if (!Produto::create($newProduto))
                dd("Error ao criar produto!!");
        }
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        return view('pages.produto.edit', [
                'produto' => Produto::find($id),
                'fornecedores'=>Fornecedor::all()
            ]);
    }

    public function update(Request $request, $id)
    {
        if($request->has('confirmar')){
            $updatedProduto = $request->all();
            $updatedProduto['importado'] = $request->has('importado');
            if (!Produto::find($id)->update($updatedProduto))
                dd("Erro ao atualizar produto $id!");
        }
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        return view(
            'pages.produto.delete',
            ['produto' => Produto::find($id)->load('fornecedor')]
        );
    }

    public function remove(Request $request, $id)
    {
        if ($request->has('confirmar'))
            if (!Produto::destroy($id))
                dd("Error ao deletar produto $id.");
        return redirect('/dashboard');
    }
}
