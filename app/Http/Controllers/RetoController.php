<?php

namespace App\Http\Controllers;

use App\Models\Reto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $retos = $user->role === 'admin'
            ? Reto::with('user')->latest()->get()
            : Reto::with('user')->where('user_id', $user->id)->latest()->get();

        return view('retos.index', compact('retos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('retos.create');
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
            'estado' => ['required', 'in:activo,completado,cancelado'],
        ]);

        $validated['user_id'] = Auth::id();

        Reto::create($validated);

        return redirect()->route('retos.index')->with('status', 'Reto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reto $reto)
    {
        $this->authorizeAccess($reto);

        $reto->load(['user', 'participantes.user', 'participantes.actividades']);

        return view('retos.show', compact('reto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reto $reto)
    {
        $this->authorizeAccess($reto);

        return view('retos.edit', compact('reto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reto $reto)
    {
        $this->authorizeAccess($reto);

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'duracion_dias' => ['required', 'integer', 'min:1'],
            'estado' => ['required', 'in:activo,completado,cancelado'],
        ]);

        $reto->update($validated);

        return redirect()->route('retos.index')->with('status', 'Reto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reto $reto)
    {
        $this->authorizeAccess($reto);

        $reto->delete();

        return redirect()->route('retos.index')->with('status', 'Reto eliminado correctamente.');
    }

    private function authorizeAccess(Reto $reto): void
    {
        $user = Auth::user();

        if ($user->role !== 'admin' && $reto->user_id !== $user->id) {
            abort(403);
        }
    }
}
