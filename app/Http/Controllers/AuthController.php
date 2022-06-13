<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $register = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'gender' => 'required|string',
            'birth' => 'required|string',
            'phone' =>  'required|string'
        ]);
        $user = User::create([
            'name' => $register['name'],
            'surname' => $register['surname'],
            'email' => $register['email'],
            'password' => bcrypt($register['password']),
            'gender' => $register['gender'],
            'profile' => "https://firebasestorage.googleapis.com/v0/b/setupios.appspot.com/o/userprofile%2Flogo-app2.png?alt=media&token=cbbb5e08-2c64-41c8-b8cd-5b3b6726434a ",
            'birth' => $register['birth'],
            'phone' => $register['phone']
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response  = ([
            'user' => $user,
            'token' => $token,
            'success' => true
        ]);
        return response($response, 200);
    }
    public function login(Request $request)
    {
        $filde = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // check email
        $user = User::where('email', $filde['email'])->first();
        // check password
        if(!$user || !Hash::check($filde['password'], $user->password)){
            return response([
                'massage' => 'Email or Password wrong!!'
            ]);
        }else{
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = ([
                'user' => $user,
                'token' => $token
            ]);
            return response($response, 201);
        };
    }
    public function logout()
    {
        auth()->user()->Tokens()->delete();
        return[
            'message'=>'Logout'
        ];
    }

    public function show($id){
        $user = User::find($id);
        return $user;
    }
    public function edit(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());

        return $user;
    }
    
}
