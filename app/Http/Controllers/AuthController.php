<?php

namespace finance\Http\Controllers;

use Illuminate\Http\Request;
use \finance\User;
use Tymon\JWTAuth\JWTAuth;
use Validator;


class AuthController extends Controller
{
    public function register(Request $request) {
//        dd($request->all());
        $validator = Validator::make($request->all(),
                [
            'name'     => 'required|string|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
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
        if(!$token = \JWTAuth::attempt($credentials)){
            return response([
               'status'=>'error',
               'error'=>'invalid.credentials',
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
        return response(['status'=>'success','data'=>$user]);
    }
    
    public function logout(Request $request) {
        JWTAuth::invalidate();
        return response([
            'status'=>'success',
            'msg'=>'Logged out successfully'
        ]);
    }
    
    public function refresh() {
        return response([
            'status','success'
        ]);
    }
}
