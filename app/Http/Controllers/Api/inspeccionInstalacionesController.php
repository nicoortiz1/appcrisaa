<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InspeccionInstalaciones;
use Illuminate\Http\Request;

class InspeccionInstalacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspecciones = InspeccionInstalaciones::with('plagas')->get();
        return response()->json($inspecciones);
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
            'sector' => 'required|string|max:255',
            'plaga_id' => 'required|exists:plagas,id',
            'causa' => 'required|string',
            'accion' => 'required|string',
            'cierre' => 'required|string',
        ]);

        $inspeccion = InspeccionInstalaciones::create($validatedData);

        return response()->json($inspeccion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspeccion = InspeccionInstalaciones::with('plagas')->findOrFail($id);
        return response()->json($inspeccion);
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
        $inspeccion = InspeccionInstalaciones::findOrFail($id);

        $validatedData = $request->validate([
            'sector' => 'sometimes|required|string|max:255',
            'plaga_id' => 'sometimes|required|exists:plagas,id',
            'causa' => 'sometimes|required|string',
            'accion' => 'sometimes|required|string',
            'cierre' => 'sometimes|required|string',
        ]);

        $inspeccion->update($validatedData);

        return response()->json($inspeccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inspeccion = InspeccionInstalaciones::findOrFail($id);
        $inspeccion->delete();

        return response()->json(null, 204);
    }
}
