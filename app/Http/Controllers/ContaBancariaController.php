<?php

namespace finance\Http\Controllers;

use finance\ContaBancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cb = ContaBancaria::all();
        if ($cb->isNotEmpty()) {
            return response()->json([
                        'status' => 'success',
                        'data' => $cb
            ]);
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Não há contas cadastradas.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $cb = new ContaBancaria();
        $cb->descricao = $request->input('descricao');
        $cb->idbanco = $request->input('idbanco');
        $cb->agencia = $request->input('agencia');
        $cb->dig_ag = $request->input('dig_ag');
        $cb->nr_conta = $request->input('nr_conta');
        $cb->dig_conta = $request->input('dig_conta');
        $cb->tipo_conta = $request->input('tipo_conta');
        $cb->ativo = $request->input('ativo');
        try {
            $cb->save();
            return response()->json([
                        'status' => 'success',
                        'msg' => 'ContaBancaria ' . $cb->descricao . ' salva com sucesso!'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                        'status' => 'error',
                        'error' => $ex->getMessage(),
                        'msg' => 'Erro ao cadastrar conta.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(ContaBancaria $contaBancaria) {
        $cb = ContaBancaria::find($id);
        if (!empty($cb)) {
            return response()->json([
                        'status' => 'success',
                        'data' => $cb
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
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContaBancaria $contaBancaria) {
        $cb = ContaBancaria::find($id);

        if (!empty($cb)) {
            $cb->descricao = $request->input('descricao');
            $cb->idbanco = $request->input('idbanco');
            $cb->agencia = $request->input('agencia');
            $cb->dig_ag = $request->input('dig_ag');
            $cb->nr_conta = $request->input('nr_conta');
            $cb->dig_conta = $request->input('dig_conta');
            $cb->tipo_conta = $request->input('tipo_conta');
            $cb->ativo = $request->input('ativo');
            try {
                $cb->save();
                return response()->json([
                            'status' => 'success',
                            'msg' => 'ContaBancaria ' . $cb->nome . ' atualizada!'
                ]);
            } catch (Exception $ex) {
                return response()->json([
                            'status' => 'error',
                            'error' => $ex->getMessage(),
                            'msg' => 'Erro ao atualizar conta.'
                ]);
            }
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Registro não encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContaBancaria $contaBancaria) {
        $cb = ContaBancaria::find($id);
        if (!empty($cb)) {
            try {
                ContaBancaria::destroy($id);
                return response()->json([
                            'status' => 'success',
                            'msg' => 'Registro removido.'
                ]);
            } catch (Exception $ex) {
                return response()->json([
                            'status' => 'error',
                            'msg' => 'Erro ao excluir registro.',
                            'error' => $ex->getMessage()
                ]);
            }
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Registro não encontrado.'
        ]);
    }

}
