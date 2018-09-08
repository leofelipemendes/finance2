<?php

namespace finance\Http\Controllers;

use finance\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Categoria::all();
        if($cat->isNotEmpty()){
            return response()->json([
               'status'=>'success',
               'data'=>$cat
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
        $cat = new Categoria();
        $cat->nome = $request->input('nome');
        $cat->descricao = $request->input('descricao');
        try{
            $cat->save();
            return response()->json([
               'status'=>'success',
               'msg'=>'Categoria '.$cat->nome.' salva com sucesso!'
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
     * @param  \finance\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Categoria::find($id);
        if(!empty($cat)){
            return response()->json([
               'status'=>'success',
               'data'=>$cat
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
     * @param  \finance\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Categoria::find($id);
        
        if(!empty($cat)){
            $cat->nome = $request->input('nome');
            $cat->descricao = $request->input('descricao');
            try{
                $cat->save();
                return response()->json([
                    'status'=>'success',
                    'msg'=>'Categoria '.$cat->nome.' atualizada!'
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
     * @param  \finance\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if(!empty($cat)){
            try{            
            Categoria::destroy($id);
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
