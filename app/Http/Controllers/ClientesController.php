<?php

namespace finance\Http\Controllers;

use finance\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cliente = Cliente::all();
        return response()->json($cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->rg = $request->input('rg');
        $cliente->cpf = $request->input('cpf');
        $cliente->endereco = $request->input('endereco');
        $cliente->bairro = $request->input('bairro');
        $cliente->numero = $request->input('numero');
        $cliente->complemento = $request->input('complemento');
        $cliente->idcidade = $request->input('idcidade');
        $cliente->iduf = $request->input('iduf');
        $cliente->ddd_res = $request->input('ddd_res');
        $cliente->tel_res = $request->input('tel_res');
        $cliente->ddd_cel = $request->input('ddd_cel');
        $cliente->tel_cel = $request->input('tel_cel');
        $cliente->ddd_out = $request->input('ddd_out');
        $cliente->tel_out = $request->input('tel_out');
        $cliente->contato = $request->input('contato');
        try {
            $cliente->save();
            return response()->json([
                        'status' => 'success',
                        'msg' => 'Novo cliente salvo com sucesso!'.$cliente->nome
            ]);
        } catch (Exception $ex) {
            return response()->json([
                        'status' => 'Error',
                        'error' => $ex->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $cliente = Cliente::find($id);
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $cliente = Cliente::find($id);
        $cliente->nome = $request->input('nome');
        $cliente->rg = $request->input('rg');
        $cliente->cpf = $request->input('cpf');
        $cliente->endereco = $request->input('endereco');
        $cliente->bairro = $request->input('bairro');
        $cliente->numero = $request->input('numero');
        $cliente->complemento = $request->input('complemento');
        $cliente->idcidade = $request->input('idcidade');
        $cliente->iduf = $request->input('iduf');
        $cliente->ddd_res = $request->input('ddd_res');
        $cliente->tel_res = $request->input('tel_res');
        $cliente->ddd_cel = $request->input('ddd_cel');
        $cliente->tel_cel = $request->input('tel_cel');
        $cliente->ddd_out = $request->input('ddd_out');
        $cliente->tel_out = $request->input('tel_out');
        $cliente->contato = $request->input('contato');
        try {
            $cliente->save();
            return response()->json([
                        'status' => 'success',
                        'msg' => 'Cadastro alterado com sucesso!'.$cliente->nome
            ]);
        } catch (Exception $ex) {
            return response()->json([
                        'status' => 'Error',
                        'error' => $ex->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $cliente = Cliente::find($id);
        try{
            $cliente->delete();
            return response()->json([
                'status'=>'success',
                'msg'=>'Cliente apagado'
            ]) ;
        } catch (Exception $ex) {
            return response()->json([
                'status'=>'error',
                'error'=>$ex->getMessage(),
                'msg'=>'Erro ao deletar cliente'
            ]) ;
        }
        
    }

}
