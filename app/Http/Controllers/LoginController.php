<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {

    
            $data=$request->validate([
                'email'=>'required|email:rfc',
                'password' => 'required'
               ]);

        if(!Auth::guard('sanctum')->check())
        {
            if (Auth::attempt($data)){
                return Auth::user()->createToken("token");
            }

            $response=[
                "success" => true,
                "message" => "Failed password or user",
                "data" => null
            ];

            return response($response,200);
    
            
    
        }

        else{
            $response=[
                "success" => true,
                "message" => "You have already logged",
                "data" => null
            ];

            
            return response($response,200);
        }

        
      
    }


    public function logout(Request $request){


        Auth::guard('sanctum')->user()->tokens()->delete();


        $response=[
            "success" => true,
            "message" => "Logout",
            "data" => null
        ];

        
        return response($response,200);
    }


    public function whoAmI(Request $request){

        

        $response=[
            "success" => true,
            "message" => "User Info",
            "data" => Auth::guard('sanctum')->user()
        ];

        
        return response($response,200);


    }
}
