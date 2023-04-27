<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $unos = $request->validate([
            "name" => 'required | string',
            "email" => 'required | string | unique:users,email',
            'password' => 'required | string | confirmed'
        ]);
        $user = User::create([
            'name' => $unos['name'],
            'email' => $unos['email'],
            'password' => bcrypt($unos['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }



    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return[
            'message' => 'Korisnik odjavljen'
        ];
    }


    public function login(Request $request){
        $unos = $request->validate([
            "name" => 'required | string',
            'password' => 'required | string'
        ]);

        $user = User::where('name', $unos['name'])->first();

        if(!$user || !Hash::check($unos['password'], $user->password)){
            return response(
                [
                    'message' => 'Podaci za prijavu neispravni!'
                ],
                401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

}
