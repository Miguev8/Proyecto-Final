<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Crear actividad') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border border-slate-200 p-6">
                <form method="POST" action="{{ route('actividades.store') }}" class="space-y-6">
                    @csrf
                    @include('actividades._form')
                    <div class="flex gap-3">
                        <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white">Guardar</button>
                        <a href="{{ route('actividades.index') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm text-slate-700">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>