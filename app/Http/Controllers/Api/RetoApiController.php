<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reto;
use Illuminate\Http\Request;

class RetoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reto::with('user', 'participantes')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'duracion_dias' => ['required', 'integer', 'min:1'],
            'user_id' => ['required', 'exists:users,id'],
            'estado' => ['nullable', 'in:activo,completado,cancelado'],
        ]);

        $reto = Reto::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'duracion_dias' => $validated['duracion_dias'],
            'user_id' => $validated['user_id'],
            'estado' => $validated['estado'] ?? 'activo',
        ]);

        return response()->json($reto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Reto::with('user', 'participantes.actividades')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reto = Reto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'descripcion' => ['sometimes', 'required', 'string'],
            'duracion_dias' => ['sometimes', 'required', 'integer', 'min:1'],
            'user_id' => ['sometimes', 'required', 'exists:users,id'],
            'estado' => ['sometimes', 'required', 'in:activo,completado,cancelado'],
        ]);

        $reto->update($validated);

        return response()->json($reto->fresh(), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reto = Reto::findOrFail($id);
        $reto->delete();

        return response()->noContent();
    }
}
