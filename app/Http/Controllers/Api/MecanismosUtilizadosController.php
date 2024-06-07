<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MecanismosUtilizados;
use Illuminate\Http\Request;

class MecanismosUtilizadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mecanismoUtilizados = MecanismosUtilizados::all();
        return response()->json($mecanismoUtilizados);
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

        $mecanismoUtilizados = MecanismosUtilizados::create($validatedData);

        return response()->json($mecanismoUtilizados, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mecanismoUtilizados = MecanismosUtilizados::findOrFail($id);
        return response()->json($mecanismoUtilizados);
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
        $mecanismoUtilizados = MecanismosUtilizados::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string|max:2000',
        ]);

        $mecanismoUtilizados->update($validatedData);

        return response()->json($mecanismoUtilizados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mecanismoUtilizados = MecanismosUtilizados::findOrFail($id);
        $mecanismoUtilizados->delete();

        return response()->json(null, 204);
    }
}
