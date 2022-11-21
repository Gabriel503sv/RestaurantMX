<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Pedido = Pedido::all();
        return $Pedido;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Pedido();
        $product->id_usuario = $request->id_usuario;
        $product->fecha = $request->fecha;
        $product->costo_envio = $request->costo_envio;
        $product->monto = $request->monto;
        $product->status = $request->status;
        $product->id_tipopago = $request->id_tipopago;

        if($product->save()){
            return response()->json([
                'Guardado' => 'Pedido Guardado con exito',
            ],200);
        }else{
            return response()->json([
                'error' => 'El pedido no se pudo guardar ',
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Pedido = Pedido::find($id);
        return $Pedido;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
