<?php

namespace finance\Http\Controllers;

use finance\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forn = Fornecedor::all();
        if($forn->isNotEmpty()){
            return response()->json([
                'status'=>'success',
                'data'=>$forn
            ]);
        }
        return response()->json([
                'status'=>'success',
                'msg'=>'nenhum registro encontrado.'
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
        $forn = new Fornecedor();
        $forn->nomefantasia = $request->input('nomefantasia');
        $forn->razaosocial = $request->input('razaosocial');
        $forn->cnpj = $request->input('cnpj');
        $forn->iduf = $request->input('iduf');
        $forn->idmunicipio = $request->input('idmunicipio');
        $forn->ie = $request->input('ie');
        $forn->im = $request->input('im');
        $forn->matriz = $request->input('matriz');
        $forn->endereco = $request->input('endereco');
        $forn->bairro = $request->input('bairro');
        $forn->numero = $request->input('numero');
        $forn->complemento = $request->input('complemento');
        $forn->contato = $request->input('contato');
        $forn->tel_contato = $request->input('tel_contato');
        $forn->save();
        return response()->json([
            'status'=>'success',
            'data'=>$forn
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \finance\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $forn = Fornecedor::find($id);
        if(!empty($forn)){
            return response()->json([
            'status'=>'success',
            'data'=>$forn
            ]);
        }
        return response()->json([
            'status'=> 'success',
            'msg'   => 'Fornecedor não encontrado'
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \finance\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forn = Fornecedor::find($id);
        $forn->nomefantasia = $request->input('nomefantasia');
        $forn->razaosocial = $request->input('razaosocial');
        $forn->cnpj = $request->input('cnpj');
        $forn->iduf = $request->input('iduf');
        $forn->idmunicipio = $request->input('idmunicipio');
        $forn->ie = $request->input('ie');
        $forn->im = $request->input('im');
        $forn->matriz = $request->input('matriz');
        $forn->endereco = $request->input('endereco');
        $forn->bairro = $request->input('bairro');
        $forn->numero = $request->input('numero');
        $forn->complemento = $request->input('complemento');
        $forn->contato = $request->input('contato');
        $forn->tel_contato = $request->input('tel_contato');
        $forn->save();
        
        return response()->json([
            'status'=>'success',
            'msg'=>'Fornecedor '.$forn->nomefantasia.' atualizado!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \finance\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forn = Fornecedor::find($id);
        try{
            $forn->delete();
            return response()->json([
                'status'=>'success',
                'msg'=>'Fornecedor removido'
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
