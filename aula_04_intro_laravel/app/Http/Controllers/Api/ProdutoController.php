<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use \Exception;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateProdutos = Produto::paginate($perPage);
        $paginateProdutos->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateProdutos);
    }

    public function show($id)
    {
        try{
            return response()->json(Produto::findOrFail($id));
        }catch(\Exception $error){
            $message = [
                "erro"=>"O produto com o id:$id não foi encontrado!",
                "exception"=>$error->getMessage()
            ];
            $status = 404;
            return response()->json($message,$status);
        }
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'qtd_estoque'=> 'required | min:1 | numeric ',
                'importado' => 'nullable | boolean'
            ]);
            $newProduto = $request->all();
            $newProduto['importado'] = $request->has('importado');
            $storedProduto = Produto::create($newProduto);
            return response()->json([
                'message'=>'Produto cadastrado com sucesso!',
                'produto'=>$storedProduto
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao cadastrar novo produto",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;//bad request
            return response()->json($message,$status);
        }
    }

    public function update(Request $request, int $id)
    {
        try{
            $data = $request->all();
            $data['importado'] = $request->has('importado');
            $updProduto = Produto::findOrFail($id);
            $updProduto->update($data);
            return response()->json([
                'message'=>'Produto atualizado com sucesso!',
                'produto'=>$updProduto
            ]);
        }catch(Exception $error){
            $message = [
                "Erro:"=>"Erro ao atualizar novo produto",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;
            return response()->json($message,$status);
        }
    }

    public function remove(int $id)
    {
        $status = 404;
        try {
            if (!Produto::findOrFail($id)->delete()) {
                $status = 500;
                throw new Exception("Erro ao deletar produto de id:$id");
            }
            return response()->json([
                'message' => "Produto id:$id removido com sucesso!"
            ]);
        } catch (Exception $error) {
            $message = [
                "Erro:" => "Erro ao remover produto",
                "Exception:" => $error->getMessage()
            ];
            return response()->json($message, $status);
        }
    }

}
