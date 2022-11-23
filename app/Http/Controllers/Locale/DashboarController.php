<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use App\Models\DetallePedido;
use App\Models\Pedido;
use Exception;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    //
    public function index(){
        //
        
        return view('Principal.Dashboard');
    }

   
    public function envio(){
        $pedidos = Pedido::where('status','Enviado')->get();
        return view('Principal.Envio',compact('pedidos'));
    }
    public function pedido(){
        $pedidos = Pedido::all();
        return view('Principal.Cocina',compact('pedidos'));
    }


    public function detalle(pedido $pedido){
        $detalles = DetallePedido::where('status',$pedido)->get();
        return view('Principal.Detalle',compact('detalles'));
    }

    public function enviado(request $request){
        try {
            $Pedido = Pedido::findOrFail($request->pedido);
            $Pedido->status = "Finalizado";
            $Pedido->save();
            return redirect()->route('envio')->with('Enviado', 'SI');
        } catch (Exception $e) {
            return redirect()->route('envio')->with('Enviado', 'NO');
        }
    }

}
