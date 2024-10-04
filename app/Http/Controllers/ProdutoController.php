<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    
    #cadastrar
    public function store(Request $request)
    {
        $produto = Produto::create([
            'nome' => $request->nome,
            'marca' => $request->marca,
            'valor' => $request->valor
        ]);
        return response()->json([
            'status' => true,
            'message' => 'cadastrado',
            'data' => $produto
        ]);
    }

    public function index()
    {
        $produtos = Produto::all();

        return response()->json([
            'status' => true,
            'data' => $produtos

        ]);
    }


    #atualizar 
    public function update(Request $request)
    {
        $produto = Produto::find($request->id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        if (isset($request->nome)) {
            $produto->nome = $request->nome;
        }

        if (isset($request->marca)) {
            $produto->marca = $request->marca;
        }

        if (isset($request->valor)) {
            $produto->valor = $request->valor;
        }

        $produto->update();

        return response()->json([
            'status' => true,
            'message' => 'atualizado'
        ]);
    }

    #atualizar
    public function delete($id)
    {
        $produto = Produto::find($id);
        if ($produto == null) {
            return response()->json([
                'status' => true,
                'message' => 'produto não encontrado'
            ]);
        }

        $produto->delete();
        return response()->json([
            'status' => true,
            'message' => 'excluido'
        ]);
    }


    public function show($id)
    {
        $produto = Produto::find($id);
        if ($produto == null) {
            return response()->json([
                'status' => true,
                'message' => 'produto não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    #procurar por nome
    public function findByName(Request $request)
    {
        $produto = Produto::where('nome', 'like', '%' . $request->nome . '%')->get();

        if ($produto->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    #pesquiusar por valor maior que o digitado
    public function pesquisarValorMaiorQue(Request $request)
    {
        $produtos = Produto::where('valor', '>=', $request->valor)->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }



    public function pesquisarEntreValores(Request $request)
    {
        $produtos = Produto::whereBetween(
            'valor',
            [$request->valorInicial, $request->valorFinal]
        )->get();


        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }


    public function findByMarca(Request $request)
    {
        $produto = Produto::where('marca', '=', $request->marca)->get();

        if ($produto->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    public function pesquisarPorAno(Request $request)
    {
        $produtos = Produto::whereYear('created_at', '=', $request->ano)->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }
    
    public function pesquisarPorMes(Request $request)
    {
        $produtos = Produto::whereMonth('created_at', '=', $request->mes)->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                "message" => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }
}
