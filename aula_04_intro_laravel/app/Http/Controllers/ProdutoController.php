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
        return view('produtos',['produtos'=>$produtos]);
    }

    public function show($id)
    {
        dd($id);
    }
}
