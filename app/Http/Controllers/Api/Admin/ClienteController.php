<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
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
        $cliente = new Cliente([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'cuil' => $request->input('cuil'),
            'dni' => $request->input('dni'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'provincia' => $request->input('provincia'),
            'descripcion' => $request->input('descripcion'),
            'publicado' => $request->input('publicado'),
            'orden' => $request->input('orden'),
        ]);

        // Guardar el cliente en la base de datos
        $cliente->save();

        // Redireccionar a la página de listado de clientes con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
