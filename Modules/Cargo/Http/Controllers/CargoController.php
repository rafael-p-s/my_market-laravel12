<?php

namespace Modules\Cargo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cargo\Entities\ModelCargo;
use Modules\Cargo\Http\Requests\CreateRequestCargo;

class CargoController extends Controller
{
    public function create(CreateRequestCargo $req)
    {
        try {
            $cargo = ModelCargo::create([
                "nome_cargo" => $req->nome_cargo,
            ]);

            return response()->json([
                'message' => 'Cargo criado com sucesso!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar cargo.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $cargo = ModelCargo::orderBy('id')->get();
        if ($cargo->isEmpty()) {
            return response()->json(['message' => 'Nenhum cargo encontrado.'], 404);
        }

        return response()->json([$cargo, 200]);
    }

    public function findCargo($nome_cargo)
    {
        $cargo = ModelCargo::where('nome_cargo', $nome_cargo)->first();
        if (!$cargo) {
            return response()->json(['message' => "Cargo {$nome_cargo} não foi encontrado."], 404);
        }

        return response()->json($cargo, 200);
    }

    public function update(Request $req, $id)
    {
        try {
            $cargo = ModelCargo::find($id);
            if (!$cargo) {
                return response()->json([
                    'error' => "Cargo não encontrado."
                ], 404);
            }

            $cargo->update([
                'nome_cargo' => $req->nome_cargo,
            ]);

            return response()->json(['message' => 'Cargo atualizado'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível atualizar cargo.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
