<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client; // Asumiendo que el modelo se llama Client

class Clients extends Controller
{
    public function store(Request $request)
{
    try {
        // Validar los datos del formulario
        $request->validate([
            'empresa' => 'required|string|max:255',
            'per_contacto' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'cuil' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        
        $request->merge([
            'publicado' => 1,
            'orden' => 1,
        ]);

        // Crear un nuevo cliente con los datos proporcionados
        $cliente = Client::create($request->all());

        return response()->json(['message' => 'Cliente creado correctamente'], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Capturar errores de validación y devolverlos como respuesta
        return response()->json(['message' => 'Error de validación: ' . $e->validator->errors()->first()], 400);
    } catch (\Exception $e) {
        // Capturar otros errores y devolver un mensaje genérico
        return response()->json(['message' => 'Error al crear el cliente: ' . $e->getMessage()], 500);
    }
}

    public function index()
    {
        // Obtener todos los clientes
        $clientes = Client::all();

        // Devolver los clientes en formato JSON
        return response()->json($clientes);
    }
}
