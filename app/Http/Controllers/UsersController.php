<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Hash;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show', 'store']]);
    }

    /**Função index do controller de Usuarios
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /** Função que mostra os dados de um usuário, caso não encontre o usuário retorna msg de erro
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.',
            ], 404);
        }

        return response()->json($user);
    }


    /** Função para criar usuários
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha de validação.',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $user = new User();
        $user->fill($data);
        $password = $request->only('password')["password"];
        $user->password = Hash::make($password);
        $user->save();

        return response()->json($user, 201);
    }

    /**Função para atualizar um usuário
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();

        // Verify if $company exists
        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.',
            ], 404);
        }

        // Remove email se ele não for alterado
        if (array_key_exists('email', $data) && $user->email == $data['email']) {
            unset($data['email']);
        }

        $validator = Validator::make($data, [
            'name' => 'max:100',
            'email' => 'email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha de validação.',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $user->fill($request->all());

        // Verifica se existe uma nova senha na requisição
        if (array_key_exists('password', $data)) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return response()->json($user);
    }

    /** Função para deletar um usuário
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.',
            ], 404);
        }

        if (\Auth::user()->id != $user->id) {
            return response()->json([
                'message' => 'Você não pode deletar esse registro.',
            ], 401);
        }

        return response()->json($user->delete(), 204);
    }
}
