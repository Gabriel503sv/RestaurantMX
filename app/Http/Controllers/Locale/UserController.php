<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $roles = Role::all();

        return view('Principal.Usuario', compact('users', 'roles'));
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
            $request->validate([

                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
                'name' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'status' => 'required',
                'id_roles' => 'required',
            ], [
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo ya ha sido usado',
                'password.required' => 'La contraseña es requerida',
                'password.min' => 'La contraseña debe tener 8 caracteres',
                'password_confirmation.required' => 'La confirmacion de la contraseña es requerida',
                'password.same' => 'La contraseñas no coinciden',
                'name.required' => 'el nombre es requerido'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'status' => $request->status,
                'id_roles' => $request->id_roles,
            ]);

            return redirect()->back()->with('agregado', 'SI');
        } catch (Exception $e) {
            return redirect()->back()->with('agregado', 'NO');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $Roles = Role::all();
        return view('Principal.Editar.UserEdit',[
            'roles' => $Roles,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        try{
           
            $request->validate([

                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
                'name' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'status' => 'required',
                'id_roles' => 'required',
            ], [
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo ya ha sido usado',
                'password.required' => 'La contraseña es requerida',
                'password.min' => 'La contraseña debe tener 8 caracteres',
                'password_confirmation.required' => 'La confirmacion de la contraseña es requerida',
                'password.same' => 'La contraseñas no coinciden',
                'name.required' => 'el nombre es requerido'
            ]);

            $data = $request->only('email','password','name','direccion','telefono','status','id_roles');
            $user->update($data);
            return redirect()->back()->with('Actualizado','SI');
        }catch(Exception $e){
            return redirect()->back()->with('Actualizado','NO');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if ($user->delete()) {
            return redirect()->back()->with('eliminado', 'SI');
        } else {
            return redirect()->back()->with('eliminado', 'NO');
        }
    }
}
