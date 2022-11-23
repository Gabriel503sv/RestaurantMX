<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use App\Models\DetallePedido;
use App\Models\Pedido;
use Exception;
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
        $pedidos = Pedido::where('status','Cocinando')->get();
        return view('Principal.Cocina',compact('pedidos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {
            $Pedido = Pedido::findOrFail($request->pedido);
            $Pedido->status = "Enviado";
            $Pedido->save();
            return redirect()->route('pedido.index')->with('Enviado', 'SI');
        } catch (Exception $e) {
            return redirect()->route('pedido.index')->with('Enviado', 'NO');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
        $detalles = DetallePedido::where('id_pedido', $pedido->id)->get();
        return view('Principal.Detalle', [
            'pedido' => $pedido,
            'detalles' => $detalles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
        $detalles = DetallePedido::where('id_pedido', $pedido->id)->get();
        return view('Principal.Detalleenvio', [
            'pedido' => $pedido,
            'detalles' => $detalles,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
