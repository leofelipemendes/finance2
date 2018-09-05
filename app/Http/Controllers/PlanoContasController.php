<?php

namespace finance\Http\Controllers;

use finance\PlanoContas;
use Illuminate\Http\Request;

class PlanoContasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcontas = PlanoContas::all();
        return response()->json($pcontas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pcontas = new PlanoContas();
        $pcontas->codigo = $request->input('codigo');
        $pcontas->descricao = $request->input('descricao');
        $pcontas->ativo = $request->input('ativo');
        try{
        $pcontas->save();
        return response()->json([
            'status'=>'success',
            'data'=>$pcontas
        ]);
            
        } catch (Exception $ex) {
            
            return response()-json([
                'status'=>'error',
                'error'=> $ex->getMessage(),
                'msg'=>'Erro ao criar novo item!'
            ]);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\PlanoContas  $planoContas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pcontas = PlanoContas::find($id);
        return response()->json($pcontas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\PlanoContas  $planoContas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pcontas = PlanoContas::find($id);
        $pcontas->codigo = $request->input('codigo');
        $pcontas->descricao = $request->input('descricao');
        $pcontas->ativo = $request->ativo('ativo');
        $pcontas->save();
        return response()->json([
            'status'=>'success updated',
            'data'=>$pcontas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\PlanoContas  $planoContas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pcontas = PlanoContas::find($id);
        $pcontas->ativo = 0;
        $pcontas->save();
        return response()->json([
            'status'=>'success',
            'msg'=>'Plano de contas desativado!'
        ]);                
    }
}
