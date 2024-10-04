<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller


{
    #cadastrar
    public function store(Request $request)
    {
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'CPF' => $request->CPF,
            'email' => $request->email,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'CEP' => $request->CEP
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cliente cadastrado',
            'data' => $cliente
        ]);
    }

        #Pesquisar por email
    public function findByEmail(Request $request){
        $cliente = Cliente::where('email', '=', $request->email)->get();
        
        if ($cliente->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'cliente não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }


    #Pesquisar por CPF
    public function findByCpf(Request $request){
        $cliente = Cliente::where('CPF', '=', $request->CPF)->get();
        if ($cliente->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'cliente não encontrado'
            ]);
         }
         return response()->json([
            'status' => true,
            'data' => $cliente
         ]);

    }

    #procurar por cidade
    public function findByCidade(Request $request){
        $cliente = Cliente::where('cidade', '=', $request->cidade)->get();
        if ($cliente->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);

    }

    #procurar por estado
    public function findByEstado(Request $request){
        $cliente = Cliente::where('estado', '=', $request->estado)->get();
        if ($cliente->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'Cliente não encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);

    }

    #procurar por ano
    public function findByAno(Request $request)
    {
        $cliente = Cliente::whereYear('dataNascimento', 'like', $request->dataNascimento . '%')->get();

        if ($cliente->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'cliente não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

    #procurar  por mes
    public function findByMes(Request $request)
    {
        $cliente = Cliente::whereMonth('dataNascimento', '=', $request->dataNascimento)->get();

        if ($cliente->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'cliente não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }


    #procurar por mes e ano
    public function pesquisarPorMesAno(Request $request)
    {
        $cliente = Cliente::where('dataNascimento', 'like', '%' . $request->dataNascimento . '%')->get();

        if ($cliente->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

    #procurar por bairro
    public function findByBairro(Request $request){
        $cliente = Cliente::where('bairro', '=', $request->bairro)->get();
        
        if ($cliente->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }



    #index
    public function index()
    {
        $cliente = Cliente::all();

        return response()->json([
            'status' => true,
            'data' => $cliente

        ]);
    }


    #show
    
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente == null) {
            return response()->json([
                'status' => true,
                'message' => 'cliente não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

}
