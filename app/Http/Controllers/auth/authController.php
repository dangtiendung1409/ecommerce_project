<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class authController extends Controller
{
    function loginUser(Request $request)
    {
        $validation = validator::make($request -> all(),[
             'email' => 'required|String|email|exists:users,email',
             'password' =>'required|String'
        ]);

        if($validation ->fails()){
            return response()->json(['status'=>400,'message'=> $validation->errors()->first()]);
        }else{
           $cred = array('email'=>$request->email,'password'=>$request->password);
           if(Auth::attempt($cred,false)){
               if(Auth::User()-> hasRole('admin')){
                   return response()->json(['status'=>200,'message'=> 'Admin User','url'=>'admin/dashboard']);
               }else{
                   return response()->json(['status'=>200,'message'=> 'Non User']);
               }
           }else{
               return response()->json(['status'=>404,'message'=> 'Wrong Cred']);
           }
        }
    }
}
