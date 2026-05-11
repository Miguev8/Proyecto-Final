<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Participante') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6 space-y-2">
                <p><span class="font-semibold">Usuario:</span> {{ $participante->user->name }}</p>
                <p><span class="font-semibold">Reto:</span> {{ $participante->reto->nombre }}</p>
                <p><span class="font-semibold">Progreso:</span> {{ $participante->progreso }}%</p>
                <p><span class="font-semibold">Completado:</span> {{ $participante->completado ? 'Sí' : 'No' }}</p>
                <p><span class="font-semibold">Inicio:</span> {{ $participante->fecha_inicio->format('Y-m-d') }}</p>
                <p><span class="font-semibold">Fin:</span> {{ $participante->fecha_fin?->format('Y-m-d') ?? 'Pendiente' }}</p>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6">
                <h3 class="font-semibold text-gray-800">Actividades</h3>
                <div class="mt-4 space-y-3">
                    @forelse ($participante->actividades as $actividad)
                        <div class="rounded-md border border-slate-200 p-4">
                            <p class="font-medium text-gray-900">{{ $actividad->descripcion }}</p>
                            <p class="text-sm text-gray-600">{{ $actividad->fecha->format('Y-m-d') }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Este participante aún no tiene actividades registradas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>