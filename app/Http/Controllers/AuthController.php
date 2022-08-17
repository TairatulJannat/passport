<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class AuthController extends Controller
{
    //
    // public function Login(Request $request){
        
    // try{
    //     if(Auth::attempt($request->only('email','password'))){
    //         $user = Auth::user();
    //         $token = $user->createToken('app')->accessToken;
    //         return response([
    //             'message' => 'Successfully Login',
    //             'token' => $token,
    //             'user' => $user

    //         ],200);
            
    //     }
        
    // }catch(Exception $exception){
    //     return response([
    //         'message'=> $exception->getMessage()
    //     ],400);
    // }
    // return response([
    //     'message' => 'Invalid Email or Password'
    // ],401);

    // }
    public function Register(RegisterRequest $request){
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password)
            ]);
            $token = $user->createToken('app')->accessToken;
            return response([
                'message' => 'Successfully Registration',
                'token' => $token,
                'user' => $user

            ],200);

        }catch(Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
    }

    public function Login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }   

}
