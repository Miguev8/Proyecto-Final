@php
    $editing = isset($participante);
@endphp

<div class="grid gap-6">
    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="user_id">Usuario</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id', $editing ? $participante->user_id : '') == $user->id)>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="reto_id">Reto</label>
            <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="reto_id" name="reto_id" required>
                @foreach ($retos as $reto)
                    <option value="{{ $reto->id }}" @selected(old('reto_id', $editing ? $participante->reto_id : '') == $reto->id)>{{ $reto->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="progreso">Progreso (%)</label>
            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="progreso" name="progreso" type="number" min="0" max="100" value="{{ old('progreso', $editing ? $participante->progreso : 0) }}" required>
        </div>
        <div class="flex items-center gap-3 pt-7">
            <input id="completado" name="completado" type="checkbox" value="1" @checked(old('completado', $editing ? $participante->completado : false))>
            <label class="text-sm font-medium text-gray-700" for="completado">Completado</label>
        </div>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="fecha_inicio">Fecha de inicio</label>
            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="fecha_inicio" name="fecha_inicio" type="date" value="{{ old('fecha_inicio', $editing && $participante->fecha_inicio ? $participante->fecha_inicio->format('Y-m-d') : '') }}" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="fecha_fin">Fecha de finalización</label>
            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="fecha_fin" name="fecha_fin" type="date" value="{{ old('fecha_fin', $editing && $participante->fecha_fin ? $participante->fecha_fin->format('Y-m-d') : '') }}">
        </div>
    </div>
</div>