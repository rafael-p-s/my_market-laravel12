<?php

namespace Modules\Cargo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cargo\Entities\ModelCargo; // Ensure this is the correct namespace for ModelCargo
use Modules\Cargo\Http\Requests\CreateCargoRequest;

class CargoController extends Controller
{
   public function create(CreateCargoRequest $req)
   {
      try {
         $cargo = ModelCargo::create([
            'nome' => $req->input('nome'),
            'setor_id' => $req->input('setor_id'),
         ]);

         return response()->json([
            'success' => true,
            'message' => 'Cargo cadastrado com sucesso.',
            'data' => $cargo
         ], 201);
      } catch (\Exception $e) {
         return response()->json([
            'error' => 'Erro ao cadastrar Cargo.',
            'details' => $e->getMessage()
         ], 500);
      }
   }

   public function read()
   {
      $cargo = ModelCargo::with(['setor'])->orderBy('id')->get();

      if ($cargo->isEmpty()) {
         return response()->json(['message' => 'Nenhum cargo encontrado.']);
      }

      return response()->json($cargo, 200);
   }

   public function update(Request $req, $id)
   {
      try {
         $cargo = ModelCargo::find($id);

         if (!$cargo) {
            return response()->json([
               'error' => 'Cargo não encontrado.'
            ], 404);
         }

         $cargo->nome = $req->nome;
         $cargo->setor_id = $req->setor_id;

         $cargo->save();

         return response()->json([
            'message' => 'Cargo atualizado.'
         ], 200);
      } catch (\Exception $e) {
         return response()->json([
            'error' => 'Erro ao atualizar cargo.',
            'details' => $e->getMessage()
         ], 500);
      }
   }

   public function delete(Request $req, $id)
   {
      $cargo = ModelCargo::find($req->$id);
      if (!$cargo) {
         return response()->json([
            'error' => 'Cargo não encontrado.'
         ], 404);
      }

      $cargo->delete();

      return response()->json(['message' => 'Cargo deletado com sucesso.']);
   }
}
