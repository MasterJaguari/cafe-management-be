<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAllUsers(){
        return User::all();
    }

    public function getOneUser($id){
        return User::find($id);
    }

    public function createUser(Request $request){
        $request->validate([
            "name" => "required | string",
            'email' => 'required | unique:users',
            "password" => 'required | confirmed',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->save();
        return response('Successful user creation', 200);
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->save();
        return response("Successful user updating", 200);
    }

    public function deleteUser($id){
        User::find($id)->delete();
        return response("Successful user removing", 200);
    }
}