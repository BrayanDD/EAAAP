<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
    // Mostrar todos los barrios
    public function index()
    {
        $barrios = Barrio::with('images')->get();
        return view('welcome', compact('barrios'));
    }

    // Mostrar el formulario para crear un nuevo barrio
    public function create()
    {
        return view('barrios.create');
    }

    // Guardar un nuevo barrio en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        Barrio::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('barrios.index')->with('success', 'Barrio creado correctamente');
    }

    // Mostrar un barrio específico
    public function show(Barrio $barrio)
    {
        return view('barrios.show', compact('barrio'));
    }

    // Mostrar el formulario para editar un barrio
    public function edit(Barrio $barrio)
    {
        return view('barrios.edit', compact('barrio'));
    }

    // Actualizar un barrio en la base de datos
    public function update(Request $request, Barrio $barrio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $barrio->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('barrios.index')->with('success', 'Barrio actualizado correctamente');
    }

    // Eliminar un barrio
    public function destroy(Barrio $barrio)
    {
        $barrio->delete();

        return redirect()->route('barrios.index')->with('success', 'Barrio eliminado correctamente');
    }
}

