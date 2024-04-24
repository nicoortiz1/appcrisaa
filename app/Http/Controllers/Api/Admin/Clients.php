<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client; // Asumiendo que el modelo se llama Client

class Clients extends Controller
{
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'cuil' => 'required|string|max:255',
        'dni' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'provincia' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'publicado' => 'required|boolean',
        'orden' => 'required|integer',
    ]);

    // Crear un nuevo cliente con los datos proporcionados
    $cliente = Client::create($request->all());

    return response()->json(['message' => 'Cliente creado correctamente'], 201);
}
}
