<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $data = User::with('roles')->whereHas('roles', function($q){
            $q;
        })->get(["id", "nombre", "email", "aprobado","token"]);
        $data = $data->map(function ($user) {
            $user['rol'] = $user->roles->first()->name; 
            unset($user->roles); 
            return $user;
        });
    
        return response()->json($data, 200);
    }
    

    public function store(Request $request){

    }

    public function show($id){
        $data = User::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        //puede ir una validacion de datos aca

        $data = User::find($id); 
        $data -> fill($request->all());
        $data->save();
        return response()->json($data, 200);
    }
}
