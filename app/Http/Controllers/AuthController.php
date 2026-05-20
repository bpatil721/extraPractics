<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request){
        $credentials = $request->validated();
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return response()->json([
                'status' => true,
                'message'=>'login succesfully',
                'redirect' => route('dashboard'),
            ]);
        }
       return response()->json([
        'status' => false,
        'message' => 'Invalid credentials',
    ], 401);
    }
    
    public function postLogout(){
        Auth::Logout();
        return response()->json(['status'=>true,'message'=>'Logout successfully','redirect'=>url('/admin-login')]);
    }
}
