<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request){
       
        $response = ["success"=>false];
        //validacion
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator->fails()){
            $response = ["error"=>$validator->errors()];
            return response()->json($response, 200);
        }

        //crear usuario
        $input = $request->all();
        $input["password"] = bcrypt($input['password']);

        $user = User::create($input);
        $user->assignRole('client');

        $response["success"] = true;
       // $response["token"] = $user->createToken("Codea")->plainTextToken;
         
        return response()->json($response, 200);
    }

    public function login(Request $request){

        $response = ["success"=>false];
        //validacion
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator->fails()){
            $response = ["error"=>$validator->errors()];
            return response()->json($response, 200);
        }

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $user->hasRole('client'); ///add rol
        
            $response['token'] = $user->createToken("crisa.app")->plainTextToken;
            $response['user'] = $user;
            $response['message'] = "Logueado";
            $response['success'] = true;    
        } else {
            $response['message'] = "Credenciales incorrectas. Por favor, inténtelo de nuevo.";
        }
        
        return response()->json($response, 200);

    }

    public function logout(){

        $response=["success"=>false];
        auth()->user()->tokens()->delete();
        $response=[
            "success"=>true,
            "message"=>"Sesion cerrada"
        ];
        return response()->json($response, 200);  

    }

    public function validateToken(Request $request)
    {
        $token = $request->bearerToken(); // Obtiene el token de autenticación de la solicitud

        if ($token && PersonalAccessToken::findToken($token)) {
            // Si hay un token presente en la solicitud y es válido
            return response()->json([
                'valid' => true,
                'message' => 'Token válido',
            ]);
        } else {
            // Si no hay un token presente en la solicitud o no es válido
            return response()->json([
                'valid' => false,
                'message' => 'Token inválido',
            ], 401); // Devuelve un código de estado 401 (No autorizado) si el token no es válido
        }
    }

}
