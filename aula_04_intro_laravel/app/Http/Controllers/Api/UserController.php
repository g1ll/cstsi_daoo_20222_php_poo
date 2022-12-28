<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusHttp=500;
        try{
            if (!$request->user()->tokenCan('is-admin')) {
                $statusHttp = 403;
                throw new Exception("Não possui permissão!!!");
            }
            $perPage = $request->query('per_page');
            $paginateUsers = User::paginate($perPage);
            $paginateUsers->appends([
                'per_page'=>$perPage
            ]);
            return response()->json($paginateUsers);
        }catch(\Exception $e){
            return response()->json([
                'erro'=>$e->getMessage()
            ],$statusHttp);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $statusHttp = 500;
        try{

            $userParams = $request->all();
            $userParams['password']  = Hash::make($request->password);
            $createdUser = User::create($userParams);
            if(!$createdUser)
                throw new \Exception("Erro ao criar usuário!!!");
            return response()->json([
                'message'=>'Usuário criado com sucesso!!',
                'user'=>$createdUser
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message'=>'Usuário não foi criado!',
                'erro'=>$e->getMessage()
            ],$statusHttp);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return response()->json(compact('user'));
        return response()->json(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
