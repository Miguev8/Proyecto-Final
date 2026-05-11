<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Actividades') }}</h2>
            <a href="{{ route('actividades.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Nueva actividad</a>
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
                                <th class="py-3 pr-4">Participante</th>
                                <th class="py-3 pr-4">Reto</th>
                                <th class="py-3 pr-4">Fecha</th>
                                <th class="py-3 pr-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($actividades as $actividad)
                                <tr>
                                    <td class="py-4 pr-4">{{ $actividad->participante->user->name }}</td>
                                    <td class="py-4 pr-4">{{ $actividad->participante->reto->nombre }}</td>
                                    <td class="py-4 pr-4">{{ $actividad->fecha->format('Y-m-d') }}</td>
                                    <td class="py-4 pr-4">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('actividades.show', $actividad) }}" class="rounded-md border border-slate-300 px-3 py-1 text-sm text-slate-700">Ver</a>
                                            <a href="{{ route('actividades.edit', $actividad) }}" class="rounded-md border border-slate-300 px-3 py-1 text-sm text-slate-700">Editar</a>
                                            <form action="{{ route('actividades.destroy', $actividad) }}" method="POST" onsubmit="return confirm('¿Eliminar esta actividad?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-md bg-red-600 px-3 py-1 text-sm text-white">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 text-center text-gray-500">No hay actividades registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>