<?php

namespace finance\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \finance\Http\Requests\RegisterFormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Tymon\JWTAuth\Exceptions\JWTException;
use finance\User;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response([
            'status'=>'success',
            'data'=>$user
        ],200);
        
    }
    
    public function login(Request $request) {
        $credentials = $request->only('email','password');
        if(!$token = JWTAuth::attempt($credentials)){
            return response([
                'status'=>'error',
                'error' => 'invalid.credentials',
                'msg'=>'Invalid Credentials'
            ],400);
        }
        return response([
            'status'=>'success',
            'token'=>$token
        ]);
    }
    
    public function user(Request $request) {
        $user = User::find(Auth::user()->id);
        return response([
            'status'=>'success',
            'data'=>$user
        ]);
    }
    
    public function logout(Request $request) {
        $this->validate($request,['token'=> 'required']);
        try{
            JWTAuth::invalidate($request->input('token'));
            return response([
                'status'=>'success',
                'msg'=>'Logged out successfully'
                ]);
        } catch (JWTException $ex) {
            return response([
               'status'=>'error',
                'msg'=>$ex->getMessage()
            ]);
        }
    }
    
    public function refresh() {
        return response([
            'status'=>'success'
            ]);
    }
}
