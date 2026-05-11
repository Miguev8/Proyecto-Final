@php
    $editing = isset($actividad);
@endphp

<div class="grid gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700" for="participante_id">Participante</label>
        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="participante_id" name="participante_id" required>
            @foreach ($participantes as $participante)
                <option value="{{ $participante->id }}" @selected(old('participante_id', $editing ? $actividad->participante_id : '') == $participante->id)>{{ $participante->user->name }} - {{ $participante->reto->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700" for="descripcion">Descripción</label>
        <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="descripcion" name="descripcion" rows="5" required>{{ old('descripcion', $editing ? $actividad->descripcion : '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700" for="fecha">Fecha</label>
        <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="fecha" name="fecha" type="date" value="{{ old('fecha', $editing && $actividad->fecha ? $actividad->fecha->format('Y-m-d') : '') }}" required>
    </div>
</div>