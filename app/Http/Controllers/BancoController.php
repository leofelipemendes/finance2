<?php

namespace finance\Http\Controllers;

use finance\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $bc = Banco::all();
        if ($bc->isNotEmpty()) {
            return response()->json([
                        'status' => 'success',
                        'data' => $bc
            ]);
        }
        return response()->json([
                    'status' => 'success',
                    'msg' => 'Não há categorias cadastradas.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $bc = new Banco();
        $bc->codigo = $request->input('codigo');
        $bc->nome = $request->input('nome');
        $bc->site = $request->input('site');
        try {
            $bc->save();
            return response()->json([
                        'status' => 'success',
                        'msg' => 'Banco ' . $bc->nome . ' salva com sucesso!'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                        'status' => 'error',
                        'error' => $ex->getMessage(),
                        'msg' => 'Erro ao cadastrar categoria.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $bc = Banco::find($id);
        if (!empty($bc)) {
            return response()->json([
                        'status' => 'success',
                        'data' => $bc
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
     * @param  \finance\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $bc = Banco::find($id);

        if (!empty($bc)) {
            if($request->input('codigo')){
                $bc->codigo = $request->input('codigo');
            }
            
            if($request->input('nome')){
                $bc->nome = $request->input('nome');
            }
            
            if($request->input('site')){
                $bc->site = $request->input('site');
            }
            
            try {
                $bc->save();
                return response()->json([
                            'status' => 'success',
                            'msg' => 'Banco ' . $bc->nome . ' atualizada!'
                ]);
            } catch (Exception $ex) {
                return response()->json([
                            'status' => 'error',
                            'error' => $ex->getMessage(),
                            'msg' => 'Erro ao atualizar categoria.'
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
     * @param  \finance\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $bc = Banco::find($id);
        if (!empty($bc)) {
            try {
                $bc->delete();
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
