<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {


     

        if (!Auth::guard('sanctum')->check()) {

            $data = $request->validate([
                'email' => 'required|email:rfc',
                'password' => 'required'
            ]);
            
            if (Auth::attempt($data)) {

                $response = [
                    "success" => true,
                    "message" => "Logged",
                    "data" => Auth::user()->createToken("token")->plainTextToken,
                ];

                return response($response, 200);
            }

            $response = [
                "success" => false,
                "message" => "Failed password or user",
                "data" => null
            ];

            return response($response, 400);
        } else {
            $response = [
                "success" => false,
                "message" => "You have already logged",
                "data" => null
            ];


            return response($response, 200);
        }
    }


    public function logout(Request $request)
    {


        Auth::guard('sanctum')->user()->tokens()->delete();


        $response = [
            "success" => true,
            "message" => "Logout",
            "data" => null
        ];


        return response($response, 200);
    }


    public function whoAmI(Request $request)
    {



        $response = [
            "success" => true,
            "message" => "User Info",
            "data" => Auth::guard('sanctum')->user()
        ];


        return response($response, 200);
    }

    public function freeAccess(Request $request)
    {
        $response = [
            "success" => true,
            "message" => "It's FreeAccess my friend",
            "data" => null,
        ];

        return response($response, 200);
    }
}
