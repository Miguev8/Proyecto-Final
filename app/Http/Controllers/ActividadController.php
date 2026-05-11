<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Participante;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::with(['participante.user', 'participante.reto'])->latest()->get();

        return view('actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $participantes = Participante::with(['user', 'reto'])->latest()->get();

        return view('actividades.create', compact('participantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'participante_id' => ['required', 'exists:participantes,id'],
            'descripcion' => ['required', 'string'],
            'fecha' => ['required', 'date'],
        ]);

        Actividad::create($validated);

        return redirect()->route('actividades.index')->with('status', 'Actividad creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        $actividad->load(['participante.user', 'participante.reto']);

        return view('actividades.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actividad $actividad)
    {
        $participantes = Participante::with(['user', 'reto'])->latest()->get();

        return view('actividades.edit', compact('actividad', 'participantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        $validated = $request->validate([
            'participante_id' => ['required', 'exists:participantes,id'],
            'descripcion' => ['required', 'string'],
            'fecha' => ['required', 'date'],
        ]);

        $actividad->update($validated);

        return redirect()->route('actividades.index')->with('status', 'Actividad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return redirect()->route('actividades.index')->with('status', 'Actividad eliminada correctamente.');
    }
}
