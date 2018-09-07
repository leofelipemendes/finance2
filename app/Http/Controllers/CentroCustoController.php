<?php

namespace finance\Http\Controllers;

use finance\CentroCusto;
use Illuminate\Http\Request;

class CentroCustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cc = CentroCusto::all();
        if($cc->isNotEmpty()){
            return response()->json([
               'status'=>'success',
                'data'=>$cc
            ]);
        }
        return response()->json([
               'status'=>'success',
                'msg'=>'Nenhum registro encontrado.'
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
        $cc = new CentroCusto();
        
        $cc->nome = $request->input('nome');
        $cc->descricao = $request->input('descricao');
        try{
            $cc->save();
            return response()->json([
               'status'=>'success',
                'msg'=>'Centro de custo '.$cc->nome.' adicionado'
            ]);
        } catch (Exception $ex) {
            return response()->json([
               'status'=>'error',
                'error'=>$ex->getMessage(),
                'msg'=>'Erro ao adicionar centro de custo'
            ]);

        }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\CentroCusto  $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cc = CentroCusto::find($id);
        if(!empty($cc)){
            return response()->json([
               'status'=>'success',
                'data'=>$cc
            ]);
        }
        return response()->json([
               'status'=>'success',
                'msg'=>'Registro não encontrado'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\CentroCusto  $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cc = CentroCusto::find($id);
        $cc->nome = $request->input('nome');
        $cc->descricao = $request->input('descricao');
        try{
            $cc->save();
            return response()->json([
               'status'=>'success',
                'msg'=>'Centro de custo '.$cc->nome.' atualizado'
            ]);
        } catch (Exception $ex) {
            return response()->json([
               'status'=>'error',
                'error'=>$ex->getMessage(),
                'msg'=>'Erro ao atualizar centro de custo'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\CentroCusto  $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cc = CentroCusto::find($id);
        try{
            if(!empty($cc)){
                $cc->delete();
                return response()->json([
                    'status'=>'success',
                    'msg'=>'Cliente removido'
                ]) ;
            }
            return response()->json([
                'status'=>'success',
                'msg'=>'Registro nao encontrado'
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
