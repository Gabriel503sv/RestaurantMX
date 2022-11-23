<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Combo;
use App\Models\DetallePedido;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $combos = Combo::all();
        return view('Principal.Combos', compact('combos', 'categories'));
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
            $folder = "productos";
            $rutaImagen = Storage::disk('s3')->put($folder, $request->imagen, 'public');



            Combo::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'id_categories' => $request->id_categories,
                'imagen' => $rutaImagen,
                'status' => $request->status,

            ]);

            return redirect()->back()->with('agregado', 'SI');
        } catch (Exception $e) {
            return redirect()->back()->with('agregado', 'NO');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(Combo $combo)
    {
        //
        $detalles = DetallePedido::where('status',$combo)->get();
        return view('Principal.Detalle',compact('detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit(Combo $combo)
    {
        //
        $categories = Category::all();
        return view('Principal.Editar.ComboEdit',[
            'combo' => $combo,
            'categories' => $categories

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        //
        try{
            $data = $request->only('nombre','descripcion','precio','id_categories','imagen','status');
            $combo->update($data);
            return redirect()->back()->with('Actualizado','SI');
        }catch(Exception $e){
            return redirect()->back()->with('Actualizado','NO');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combo $combo)
    {
        //
        try{

            Storage::disk('s3')->delete($combo->imagen);
            
            $combo->delete();
            
            return redirect()->back()->with('eliminado', 'SI');
        
        } catch(Exception $e) {
            return redirect()->back()->with('eliminado', 'NO');
        }
    }
}
