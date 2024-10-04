<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
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
        $produto = Produto::all();

        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

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

    public function delete($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
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
                'status' => false,
                'message' => 'produto não encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $produto
        ]);
    }

    public function findByName(Request $request)
    {
        $produtos = Produto::where('nome', 'like', '%' . $request->nome . '%')->get();

        if ($produtos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisaValorMaiorQue(Request $request){
        $produtos = Produto::where('valor', '>=', $request->valor)->get();

        if($produtos->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisaEntreValores(Request $request){
        $produtos = Produto::whereBetween('valor', [$request->valorInicial, $request->valorFinal])->get();

        if($produtos->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisaEntreMarca(Request $request){
        $produtos = Produto::where('marca','=', $request->marca)->get();

        if($produtos->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisaPorAno(Request $request){
        $produtos = Produto::whereYear('created_at', '=', $request->ano)->get();

        if($produtos->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }

    public function pesquisaPorMes(Request $request){
        $produtos = Produto::wheremonth('created_at', '=', $request->mes)->get();

        if($produtos->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $produtos
        ]);
    }
} 
