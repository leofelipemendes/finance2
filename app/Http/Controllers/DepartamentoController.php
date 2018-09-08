<?php

namespace finance\Http\Controllers;

use finance\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Departamento::all();
        if($dept->isNotEmpty()){
            return response()->json([
                'status'=>'success',
                'data'=>$dept
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
        $dept = new Departamento();
        $dept->nome = $request->input('nome');
        $dept->descricao = $request->input('descricao');
        
        try{
            $dept->save();
            return response()->json([
                'status'=>'success',
                'msg'=>'Departamento '.$dept->nome.' criado com sucesso!'
            ]);
            
        } catch (Exception $ex) {
            return response()->json([
                'status'=>'error',
                'error'=> $ex->getMessage(),
                'msg'=>'Erro ao criar departamento'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dept = Departamento::find($id);
        if(!empty($dept)){
             return response()->json([
                'status'=>'success',
                'data'=>$dept
            ]);
        }
        return response()->json([
            'status'=>'success',
            'msg'=>'Departamento não encontrado!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dept = Departamento::find($id);
        $dept->nome = $request->input('nome');
        $dept->descricao = $request->input('descricao');
        try{
            $dept->save();
            return response()->json([
                'status'=>'success',
                'data'=>$dept,
                'msg'=>'Departamento '.$dept->nome.' atualizado'
            ]);
            
        } catch (Exception $ex) {

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dept = Departamento::find($id);
        try {
            Departamento::destroy($id);
            return response()->json([
                'status'=>'success',
                'msg'=>'Departamento removido com sucesso.'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status'=>'success',
                'error'=>$ex->getMessage(),
                'msg'=>'Erro ao remover depto'
            ]);
        }
    }
}
