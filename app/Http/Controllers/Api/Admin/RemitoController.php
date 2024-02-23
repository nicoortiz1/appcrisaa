<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remito;
use Illuminate\Support\Str;


class RemitoController extends Controller
{
    public function index(){
        $data = Remito::orderBy("orden")->get(["id", "nombre"]); // Corregido "ordenBy" a "orderBy"
        return response()->json($data, 200);
    }

    public function store(Request $request){
        ///poner una validacion
        $data= new Remito($request->all());
        ///upload image base64
        if($request->urlfoto){
            $img = $request->urlfoto;
            // proceso
            $folderParth = "/img/remito/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux =explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderParth . Str::slug($request->nombre) . '.'.$image_type;
            file_put_contents(public_path($file), $image_base64);
             
            $data->urlfoto = Str::slug($request->nombre) . '.'.$image_type; 
        }
        
        $data->slug = Str::slug($request->nombre);
        $imag = $request->urlfoto;
        $data->save();
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Remito::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        //puede ir una validacion de datos aca

        $data = Remito::find($id); 
        $data -> fill($request->all());
        if($request->urlfoto){
            $img = $request->urlfoto;
            // proceso
            $folderParth = "/img/remito/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux =explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderParth . Str::slug($request->nombre) . '.'.$image_type;
            file_put_contents(public_path($file), $image_base64);
             
            $data->urlfoto = Str::slug($request->nombre) . '.'.$image_type; 
        }
        
        $data->slug = Str::slug($request->nombre);
        $data->save();
        return response()->json($data, 200);
    }

    public function destroy($id){
        $data = Remito::find($id);
        $data->delete();
        return response()->json("remito borrado", 200);
    }
}
