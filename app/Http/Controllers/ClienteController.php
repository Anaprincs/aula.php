<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Mailer;

use function Ramsey\Uuid\v1;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $clientes = Clientes::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'CPF' => $request->CPF,
            'email' => $request->email,
            'nascimento' => $request->nascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'CEP' => $request->CEP
        ]);

        return response()->json([
            'status' => true,
            'message' => 'cadastrado',
            'data' => $clientes
        ]);
    }

    public function findByEmail(Request $request)
    {
        $clientes = Clientes::where('email', 'like', '%' . $request->email . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function findByCPF(Request $request)
    {
        $clientes = Clientes::where('CPF', 'like', '%' . $request->CPF . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function findByCidade(Request $request)
    {
        $clientes = Clientes::where('cidade', 'like', '%' . $request->cidade . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function findByEstado(Request $request)
    {
        $clientes = Clientes::where('estado', 'like', '%' . $request->estado . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function AnoNascimento (Request $request){
        $clientes = Clientes::whereYear('nascimento', '=', $request->nascimento)->get();

        if($clientes->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function MesNascimento (Request $request){
        $clientes = Clientes::whereMonth('nascimento', '=', $request->nascimento)->get();

        if($clientes->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function MesAno (Request $request){
        $clientes = Clientes::whereMonth('nascimento', '=', $request->nascimento)->whereYear('nascimento', '=', $request->nascimento)->get();

        if($clientes->isEmpty()){
            return  response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }


    public function findByBairro(Request $request)
    {
        $clientes = Clientes::where('bairro', 'like', '%' . $request->estado . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function update(Request $request)
    {
        $clientes = Clientes::find($request->id);

        if ($clientes == null) {
            return response()->json([
                'status' => false,
                'message' => 'Produto não encontrado'
            ]);
        }

        if (isset($request->nome)) {
            $clientes->nome = $request->nome;
        }

        if (isset($request->marca)) {
            $clientes->celular = $request->marca;
        }

        if (isset($request->valor)) {
            $clientes->CPF = $request->CPF;
        }

        if (isset($request->valor)) {
            $clientes->email = $request->email;
        }

        if (isset($request->valor)) {
            $clientes->cidade = $request->cidade;
        }

        if (isset($request->valor)) {
            $clientes->estado = $request->estado;
        }

        if (isset($request->valor)) {
            $clientes->nascimento = $request->nascimento;
        }

        if (isset($request->valor)) {
            $clientes->pais = $request->pais;
        }

        if (isset($request->valor)) {
            $clientes->rua = $request->rua;
        }

        if (isset($request->valor)) {
            $clientes->numero = $request->numero;
        }

        if (isset($request->valor)) {
            $clientes->bairro = $request->bairro;
        }

        if (isset($request->valor)) {
            $clientes->CEP= $request->CEP;
        }

        $clientes->update();

        return response()->json([
            'status' => true,
            'message' => 'atualizado'
        ]);
    }

    public function delete($id)
    {
        $clientes = Clientes::find($id);

        if ($clientes == null) {
            return response()->json([
                'status' => false,
                'message' => 'produto não encontrado'
            ]);
        }

        $clientes->delete();

        return response()->json([
            'status' => true,
            'message' => 'excluido'
        ]);
    }

    public function show($id)
    {

        $clientes = Clientes::find($id);


        if ($clientes == null) {
            return response()->json([
                'status' => false,
                'message' => 'produto não encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function findByName(Request $request)
    {
        $clientes = Clientes::where('nome', 'like', '%' . $request->nome . '%')->get();

        if ($clientes->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

    public function index()
    {
        $clientes = Clientes::all();

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }

}
