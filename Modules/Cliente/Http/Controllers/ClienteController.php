<?php

namespace Modules\Cliente\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Cliente\Entities\ModelCliente;
use Modules\Cliente\Http\Requests\CreateRequestCliente;

class ClienteController extends Controller
{
    public function create(CreateRequestCliente $req)
    {
        // dd('chegou aqui antes de tentar criar');
        try {
            $cliente = ModelCliente::create([
                "nome" => $req->nome,
                "sobrenome" => $req->sobrenome,
                "cpf" => $req->cpf,
                "telefone" => $req->telefone,
                "celular" => $req->celular,
                "endereco" => $req->endereco,
                "numero_casa" => $req->numero_casa,
                "complemento" => $req->complemento,
                "cidade" => $req->cidade,
                "estado" => $req->estado,

                "email" => $req->email,
                "password" => Hash::make($req->password)
            ]);

            return response()->json([
                'message' => 'Cliente cadastrado com sucesso!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar cliente.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $cliente = ModelCliente::orderBy('id')->get();
        if ($cliente->isEmpty()) {
            return response()->json(['message' => "Nenhum cliente encontrado."]);
        }

        return response()->json($cliente, 200);
    }

    public function update(Request $req, $id)
    {
        try {
            $cliente = ModelCliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'erro' => "Cliente não encontrado."
                ], 404);
            }

            $cliente->update([
                "nome" => $req->nome,
                "sobrenome" => $req->sobrenome,
                "cpf" => $req->cpf,
                "telefone" => $req->telefone,
                "celular" => $req->celular,
                "endereco" => $req->endereco,
                "cidade" => $req->cidade,
                "estado" => $req->estado,

                "email" => $req->email,
                "password" => Hash::make($req->password)
            ]);

            return response()->json([
                'message' => 'Cliente atualizdo',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao atualizar cliente.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $req, $id)
    {
        $cliente = ModelCliente::find($id);

        if (!$cliente) {
            return response()->json([
                'error' => 'Cliente não encontrado.'
            ], 404);
        }

        $cliente->delete();

        return response()->json(['messge' => 'Cliente deletado.']);
    }
}
