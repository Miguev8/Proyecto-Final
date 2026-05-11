<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold">{{ __('Bienvenido al sistema de retos personales') }}</p>
                    <p class="mt-2 text-sm text-gray-600">{{ __('Desde aquí puedes administrar retos, participantes y actividades. Usa la navegación superior para entrar a cada módulo.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
