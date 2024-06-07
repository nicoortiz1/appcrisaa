<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TiposDispositivos;
use Illuminate\Http\Request;

class TiposDispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDispositivos = TiposDispositivos::all();
        return response()->json($tiposDispositivos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2000',
        ]);

        $tipoDispositivo = TiposDispositivos::create($validatedData);

        return response()->json($tipoDispositivo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDispositivo = TiposDispositivos::findOrFail($id);
        return response()->json($tipoDispositivo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoDispositivo = TiposDispositivos::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string|max:2000',
        ]);

        $tipoDispositivo->update($validatedData);

        return response()->json($tipoDispositivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDispositivo = TiposDispositivos::findOrFail($id);
        $tipoDispositivo->delete();

        return response()->json(null, 204);
    }
}
