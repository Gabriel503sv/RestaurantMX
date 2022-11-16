<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    //
    

    public function Iniciarsesion(request $request){
        $credentials = $request->only('email','password');
        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'invalid credentials',
                ],400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'not create token',
            ],500);
        }

        return response()->json(compact('token'));
    }
    
}
