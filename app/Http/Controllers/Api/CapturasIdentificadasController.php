<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CapturasIdentificadas;
use Illuminate\Http\Request;

class CapturasIdentificadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capturasIdentificadas = CapturasIdentificadas::all();
        return response()->json($capturasIdentificadas);
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
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
        ]);

        $capturaIdentificada = CapturasIdentificadas::create($validatedData);

        return response()->json($capturaIdentificada, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capturaIdentificada = CapturasIdentificadas::findOrFail($id);
        return response()->json($capturaIdentificada);
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
        $capturaIdentificada = CapturasIdentificadas::findOrFail($id);

        $validatedData = $request->validate([
            'tipo' => 'sometimes|required|string|max:255',
            'cantidad' => 'sometimes|required|integer|min:0',
        ]);

        $capturaIdentificada->update($validatedData);

        return response()->json($capturaIdentificada);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capturaIdentificada = CapturasIdentificadas::findOrFail($id);
        $capturaIdentificada->delete();

        return response()->json(null, 204);
    }
}
