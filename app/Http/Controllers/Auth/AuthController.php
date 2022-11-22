<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(){
        return view('Auth.login');
    }

    public function loginverify(request $request){
        if(Auth::attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect()->route('index');
        }
        return back()->withErrors(['invalid_credentials'=>'Usuario y contraseña invalida'])->withInput();
    }

    public function signOut(Request $request,Redirect $redirect){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success',"session cerrada correctamente");
    }
    

    
}
