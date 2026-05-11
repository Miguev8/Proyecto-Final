@php
    $editing = isset($reto);
@endphp

<div class="grid gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700" for="nombre">Nombre</label>
        <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="nombre" name="nombre" type="text" value="{{ old('nombre', $editing ? $reto->nombre : '') }}" required>
        @error('nombre')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700" for="descripcion">Descripción</label>
        <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="descripcion" name="descripcion" rows="5" required>{{ old('descripcion', $editing ? $reto->descripcion : '') }}</textarea>
        @error('descripcion')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="duracion_dias">Duración en días</label>
            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="duracion_dias" name="duracion_dias" type="number" min="1" value="{{ old('duracion_dias', $editing ? $reto->duracion_dias : 30) }}" required>
            @error('duracion_dias')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700" for="estado">Estado</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="estado" name="estado" required>
                @foreach (['activo' => 'Activo', 'completado' => 'Completado', 'cancelado' => 'Cancelado'] as $value => $label)
                    <option value="{{ $value }}" @selected(old('estado', $editing ? $reto->estado : 'activo') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('estado')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>
</div>