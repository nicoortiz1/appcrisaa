<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductosQuimicos;
use Illuminate\Http\Request;

class ProductosQuimicosController extends Controller
{
    // Listar todos los productos químicos
    public function index()
    {
        $productos = ProductosQuimicos::all();
        return response()->json($productos);
    }

    // Mostrar un producto químico específico
    public function show($id)
    {
        $producto = ProductosQuimicos::findOrFail($id);
        return response()->json($producto);
    }

    // Crear un nuevo producto químico
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_comercial' => 'required|string|max:255',
            'princ_activo' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'lote' => 'required|string|max:255',
            'vcto' => 'required|date',
        ]);

        $producto = ProductosQuimicos::create($validatedData);

        return response()->json($producto, 201);
    }

    // Actualizar un producto químico existente
    public function update(Request $request, $id)
    {
        $producto = ProductosQuimicos::findOrFail($id);

        $validatedData = $request->validate([
            'nombre_comercial' => 'sometimes|required|string|max:255',
            'princ_activo' => 'sometimes|required|string|max:255',
            'dosis' => 'sometimes|required|string|max:255',
            'lote' => 'sometimes|required|string|max:255',
            'vcto' => 'sometimes|required|date',
            'forma_aplicacion' => 'sometimes|required|string|max:255',
        ]);

        $producto->update($validatedData);

        return response()->json($producto);
    }

    // Eliminar un producto químico
    public function destroy($id)
    {
        $producto = ProductosQuimicos::findOrFail($id);
        $producto->delete();

        return response()->json(null, 204);
    }
}
