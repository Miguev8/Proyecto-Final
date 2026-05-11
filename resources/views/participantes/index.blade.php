<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Participantes') }}</h2>
            <a href="{{ route('participantes.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Nuevo participante</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="rounded-md bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('status') }}</div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg border border-slate-200">
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                <th class="py-3 pr-4">Usuario</th>
                                <th class="py-3 pr-4">Reto</th>
                                <th class="py-3 pr-4">Progreso</th>
                                <th class="py-3 pr-4">Completado</th>
                                <th class="py-3 pr-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($participantes as $participante)
                                <tr>
                                    <td class="py-4 pr-4">{{ $participante->user->name }}</td>
                                    <td class="py-4 pr-4">{{ $participante->reto->nombre }}</td>
                                    <td class="py-4 pr-4">{{ $participante->progreso }}%</td>
                                    <td class="py-4 pr-4">{{ $participante->completado ? 'Sí' : 'No' }}</td>
                                    <td class="py-4 pr-4">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('participantes.show', $participante) }}" class="rounded-md border border-slate-300 px-3 py-1 text-sm text-slate-700">Ver</a>
                                            <a href="{{ route('participantes.edit', $participante) }}" class="rounded-md border border-slate-300 px-3 py-1 text-sm text-slate-700">Editar</a>
                                            <form action="{{ route('participantes.destroy', $participante) }}" method="POST" onsubmit="return confirm('¿Eliminar este participante?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-md bg-red-600 px-3 py-1 text-sm text-white">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500">No hay participantes registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>