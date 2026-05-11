<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Actividad') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6 space-y-2">
                <p><span class="font-semibold">Participante:</span> {{ $actividad->participante->user->name }}</p>
                <p><span class="font-semibold">Reto:</span> {{ $actividad->participante->reto->nombre }}</p>
                <p><span class="font-semibold">Fecha:</span> {{ $actividad->fecha->format('Y-m-d') }}</p>
                <div class="pt-3">
                    <h3 class="font-semibold text-gray-800">Descripción</h3>
                    <p class="mt-2 text-gray-600 whitespace-pre-line">{{ $actividad->descripcion }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>