<?php

namespace finance\Http\Controllers;

use finance\Lancamento;
use Illuminate\Http\Request;

class LancamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lanc = Lancamento::all();
        if ($lanc->isNotEmpty()) {
            return response()->json([
                        'status' => 'success',
                        'data' => $lanc
            ]);
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Não há lancamentos cadastrados.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lanc = new Lancamento();
        $lanc->descricao = $request->input('descricao');
        $lanc->data_competencia = $request->input('data_competencia');
        $lanc->data_vencimento = $request->input('data_vencimento');
        $lanc->valor = $request->input('valor');
        $lanc->pago = $request->input('pago');
        $lanc->idfornecedor = $request->input('idfornecedor');
        $lanc->idcliente = $request->input('idcliente');
        $lanc->idcategoria = $request->input('idcategoria');
        $lanc->idconta = $request->input('idconta');
        $lanc->idcentrocusto = $request->input('idcentrocusto');
        try {
            $lanc->save();
            return response()->json([
                        'status' => 'success',
                        'msg' => 'Lancamento ' . $lanc->descricao . ' salvo com sucesso!'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                        'status' => 'error',
                        'error' => $ex->getMessage(),
                        'msg' => 'Erro ao cadastrar Lancamento.'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lanc = Lancamento::find($id);
        if (!empty($lanc)) {
            return response()->json([
                        'status' => 'success',
                        'data' => $lanc
            ]);
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Registro não encontrado.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $lanc = Lancamento::find($id);
        if(!empty($lanc)){
            $lanc->descricao = $request->input('descricao');
            $lanc->data_competencia = $request->input('data_competencia');
            $lanc->data_vencimento = $request->input('data_vencimento');
            $lanc->valor = $request->input('valor');
            $lanc->idfornecedor = $request->input('idfornecedor');
            $lanc->idcliente = $request->input('idcliente');
            $lanc->idcategoria = $request->input('idcategoria');
            $lanc->idconta = $request->input('idconta');
            $lanc->idcentrocusto = $request->input('idcentrocusto');   
        try {
            $lanc->save();
            return response()->json([
                'status' => 'success',
                'msg' => 'Lancamento ' . $lanc->descricao . ' salvo com sucesso!'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => $ex->getMessage(),
                'msg' => 'Erro ao cadastrar Lancamento.'
            ]);
        }
        
            
        }
        return response()->json([
                'status' => 'success',
                'msg' => 'Registro não encontrado.'
            ]);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$lanc = Lancamento::find($id);
        try{
            Lancamento::destroy($id);
            return response()->json([
                'status'=>'success',
                'msg'=>'Registro removido!'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status'=>'error',
                'error'=>$ex->getMessage(),
                'msg'=>'Erro ao remover registro.'
            ]);

        }
        
    }
}
