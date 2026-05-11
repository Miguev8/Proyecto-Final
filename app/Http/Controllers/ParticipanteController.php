<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Reto;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::with(['user', 'reto'])->latest()->get();

        return view('participantes.index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $retos = Reto::orderBy('nombre')->get();
        $users = User::orderBy('name')->get();

        return view('participantes.create', compact('retos', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'reto_id' => ['required', 'exists:retos,id'],
            'progreso' => ['required', 'integer', 'min:0', 'max:100'],
            'completado' => ['nullable', 'boolean'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_inicio'],
        ]);

        $validated['completado'] = $request->boolean('completado');

        Participante::create($validated);

        return redirect()->route('participantes.index')->with('status', 'Participante creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        $participante->load(['user', 'reto', 'actividades']);

        return view('participantes.show', compact('participante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participante $participante)
    {
        $retos = Reto::orderBy('nombre')->get();
        $users = User::orderBy('name')->get();

        return view('participantes.edit', compact('participante', 'retos', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participante $participante)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'reto_id' => ['required', 'exists:retos,id'],
            'progreso' => ['required', 'integer', 'min:0', 'max:100'],
            'completado' => ['nullable', 'boolean'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_inicio'],
        ]);

        $validated['completado'] = $request->boolean('completado');

        $participante->update($validated);

        return redirect()->route('participantes.index')->with('status', 'Participante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participante $participante)
    {
        $participante->delete();

        return redirect()->route('participantes.index')->with('status', 'Participante eliminado correctamente.');
    }
}
