<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $reto->nombre }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6 space-y-3">
                <p class="text-sm text-gray-500">Responsable: {{ $reto->user->name }}</p>
                <p class="text-sm text-gray-500">Duración: {{ $reto->duracion_dias }} días</p>
                <p class="text-sm text-gray-500">Estado: {{ ucfirst($reto->estado) }}</p>
                <div class="pt-3">
                    <h3 class="font-semibold text-gray-800">Descripción</h3>
                    <p class="mt-2 text-gray-600 whitespace-pre-line">{{ $reto->descripcion }}</p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6">
                <h3 class="font-semibold text-gray-800">Participantes vinculados</h3>
                <div class="mt-4 space-y-3">
                    @forelse ($reto->participantes as $participante)
                        <div class="rounded-md border border-slate-200 p-4">
                            <p class="font-medium text-gray-900">{{ $participante->user->name }}</p>
                            <p class="text-sm text-gray-600">Progreso: {{ $participante->progreso }}%</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay participantes registrados en este reto.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>