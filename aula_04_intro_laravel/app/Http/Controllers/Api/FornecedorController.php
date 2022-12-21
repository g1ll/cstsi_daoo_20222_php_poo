<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateFornecedor = Fornecedor::paginate($perPage);
        $paginateFornecedor->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateFornecedor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newFornecedor = $request->all();
            $storedFornecedor = Fornecedor::create($newFornecedor);
            return response()->json([
                'message' => 'Fornecedor cadastrado com sucesso!',
                'Fornecedor' => $storedFornecedor
            ]);
        } catch (\Exception $error) {
            $message = [
                "Erro:" => "Erro ao cadastrar novo Fornecedor",
                "Exception:" => $error->getMessage()
            ];
            $status = 401; //bad request
            return response()->json($message, $status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        return response()->json(['fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        try {
            $data = $request->all();
            $fornecedor->update($data);
            return response()->json([
                'message' => 'Fornecedor atualizado com sucesso!',
                'Fornecedor' => $fornecedor
            ]);
        } catch (\Exception $error) {
            $message = [
                "Erro:" => "Erro ao atualizar fornecedor",
                "Exception:" => $error->getMessage()
            ];
            $status = 401;
            return response()->json($message, $status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        try {
            if (!$fornecedor->delete())
                throw new \Exception("Erro não detectado, tente mais tarde!");

            return response()->json([
                "msg" => "Fornecedor excluido.",
                "fornecedor" => $fornecedor
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao deletar o fornecedor!",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function Fornecedors(Fornecedor $fornecedor)
    {
        return response()->json([
            ['fornecedor'=>$fornecedor->load('Fornecedors')]
        ]);
    }
}
