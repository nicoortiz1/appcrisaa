<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CtrlQuimico;
use Illuminate\Http\Request;

class CtrlQuimicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctrlQuimicos = CtrlQuimico::with(['mecanismosUtilizados', 'plagas'])->get();
        return response()->json($ctrlQuimicos);
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
            'mecanismos_utilizados_id' => 'required|exists:mecanismos_utilizados,id',
        ]);

        $ctrlQuimico = CtrlQuimico::create($validatedData);

        return response()->json($ctrlQuimico, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ctrlQuimico = CtrlQuimico::with(['mecanismosUtilizados', 'plagas'])->findOrFail($id);
        return response()->json($ctrlQuimico);
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
        $ctrlQuimico = CtrlQuimico::findOrFail($id);

        $validatedData = $request->validate([
            'sector' => 'sometimes|required|string|max:255',
            'plaga_id' => 'sometimes|required|exists:plagas,id',
            'mecanismos_utilizados_id' => 'sometimes|required|exists:mecanismos_utilizados,id',
        ]);

        $ctrlQuimico->update($validatedData);

        return response()->json($ctrlQuimico);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ctrlQuimico = CtrlQuimico::findOrFail($id);
        $ctrlQuimico->delete();

        return response()->json(null, 204);
    }
}
