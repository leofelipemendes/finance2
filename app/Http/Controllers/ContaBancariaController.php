<?php

namespace finance\Http\Controllers;

use finance\ContaBancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cb = ContaBancaria::all();
        if($cb->isNotEmpty()){
            return response()->json([
               'status'=>'success',
               'data'=>$cb
            ]);
        }
        return response()->json([
               'status'=>'success',
               'msg'=>'Não há categorias cadastradas.'
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
        $cb = new ContaBancaria();
        $cb->nome = $request->input('nome');
        $cb->descricao = $request->input('descricao');
        try{
            $cb->save();
            return response()->json([
               'status'=>'success',
               'msg'=>'ContaBancaria '.$cb->nome.' salva com sucesso!'
            ]);
            
        } catch (Exception $ex) {
            return response()->json([
               'status'=>'error',
               'error'=>$ex->getMessage(),
               'msg'=>'Erro ao cadastrar categoria.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(ContaBancaria $contaBancaria)
    {
        $cb = ContaBancaria::find($id);
        if(!empty($cb)){
            return response()->json([
               'status'=>'success',
               'data'=>$cb
            ]);
        }
        return response()->json([
               'status'=>'success',
               'msg'=>'Registro não encontrado.'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContaBancaria $contaBancaria)
    {
        $cb = ContaBancaria::find($id);
        
        if(!empty($cb)){
            $cb->nome = $request->input('nome');
            $cb->descricao = $request->input('descricao');
            try{
                $cb->save();
                return response()->json([
                    'status'=>'success',
                    'msg'=>'ContaBancaria '.$cb->nome.' atualizada!'
                ]);
            } catch (Exception $ex) {
                return response()->json([
                    'status'=>'error',
                    'error'=>$ex->getMessage(),
                    'msg'=>'Erro ao atualizar categoria.'
                ]);
            }
        }
        return response()->json([
            'status'=>'success',
            'msg'=>'Registro não encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\ContaBancaria  $contaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContaBancaria $contaBancaria)
    {
        $cb = ContaBancaria::find($id);
        if(!empty($cb)){
            try{            
            $cb->delete();
                return response()->json([
                    'status'=>'success',
                    'msg'=>'Registro removido.'
                ]);
            } catch (Exception $ex) {
                return response()->json([
                    'status'=>'error',
                    'msg'=>'Erro ao excluir registro.',
                    'error'=>$ex->getMessage()
                ]);

            }
        }
        return response()->json([
                    'status'=>'success',
                    'msg'=>'Registro não encontrado.'
                ]);
    }
}
