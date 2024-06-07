<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ControlAves;
use Illuminate\Http\Request;

class ControlAvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlesAves = ControlAves::with(['mecanismosUtilizados', 'capturasIdentificadas'])->get();
        return response()->json($controlesAves);
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
            'ubicacion' => 'required|string|max:255',
            'mecanismos_utilizados_id' => 'required|exists:mecanismos_utilizados,id',
            'cap_identificadas_id' => 'required|exists:capturas_identificadas,id',
            'observaciones' => 'nullable|string',
        ]);

        $controlAves = ControlAves::create($validatedData);

        return response()->json($controlAves, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controlAves = ControlAves::with(['mecanismosUtilizados', 'capturasIdentificadas'])->findOrFail($id);
        return response()->json($controlAves);
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
        $controlAves = ControlAves::findOrFail($id);

        $validatedData = $request->validate([
            'ubicacion' => 'sometimes|required|string|max:255',
            'mecanismos_utilizados_id' => 'sometimes|required|exists:mecanismos_utilizados,id',
            'cap_identificadas_id' => 'sometimes|required|exists:capturas_identificadas,id',
            'observaciones' => 'nullable|string',
        ]);

        $controlAves->update($validatedData);

        return response()->json($controlAves);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $controlAves = ControlAves::findOrFail($id);
        $controlAves->delete();

        return response()->json(null, 204);
    }
}
