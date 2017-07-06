<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class PokemonsController extends Controller
{
    /**
     * PokemonsController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }

    /** Função index de Pokemons controller
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $pokemons = Pokemon::with('user')->get();
        return response()->json($pokemons);
    }

    /** Função que retorna os dados de um pokemon, caso não encontre retorna msg de erro.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);

        if (!$pokemon) {
            return response()->json([
                'message' => 'Pokemon não encontrado.',
            ], 404);
        }

        return response()->json($pokemon);
    }

    /** Função para criar pokemons
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'type' => 'required',
            'attack' => 'integer',
            'defense' => 'integer',
            'agility' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha de validação.',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $pokemon = new Pokemon();
        $pokemon->fill($data);
        $pokemon->user_id = \Auth::user()->id;
        $pokemon->save();

        return response()->json($pokemon, 201);
    }

    /**Função para atualizar um pokemon
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::find($id);

        if (!$pokemon) {
            return response()->json([
                'message' => 'Pokemon não encontrado.',
            ], 404);
        }

        if (\Auth::user()->id != $pokemon->user_id) {
            return response()->json([
                'message' => 'Você não tem permissão para alterar este pokemon.',
            ], 401);
        }

        $validator = Validator::make($data, [
            'name' => 'max:255',
            'type' => 'required',
            'attack' => 'integer',
            'defense' => 'integer',
            'agility' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha de validação.',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $pokemon->fill($request->all());
        $pokemon->save();

        return response()->json($pokemon);
    }

    /** Função para deletar um pokemon
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $pokemon = Pokemon::find($id);

        if (!$pokemon) {
            return response()->json([
                'message' => 'Pokemon não encontrado.',
            ], 404);
        }

        if (\Auth::user()->id != $pokemon->user_id) {
            return response()->json([
                'message' => 'Você não tem permissão para alterar este pokemon.',
            ], 401);
        }

        $pokemon->delete();
    }
}
