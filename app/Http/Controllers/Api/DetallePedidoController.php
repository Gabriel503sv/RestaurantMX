<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetallePedido;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Detalle = DetallePedido::all();
        return $Detalle;
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
        $Detalle = new DetallePedido();
        $Detalle->precio = $request->precio;
        $Detalle->cantidad = $request->cantidad;
        $Detalle->status = $request->status;
        $Detalle->id_pedido = $request->id_pedido;
        $Detalle->id_combo = $request->id_combo;

        if($Detalle->save()){
            return response()->json([
                'Guardado' => 'Detalle Pedido Guardado con exito',
            ],200);
        }else{
            return response()->json([
                'error' => 'El Detalle Pedido no se pudo guardar ',
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
        $Detalle = DetallePedido::find($id);
        return $Detalle;
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
