<?php

namespace Database\Seeders;

use App\Models\Actividad;
use App\Models\Participante;
use App\Models\Reto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@retos.test',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $usuario = User::create([
            'name' => 'Usuario Demo',
            'email' => 'usuario@retos.test',
            'role' => 'usuario',
            'password' => Hash::make('password'),
        ]);

        $retoUno = Reto::create([
            'nombre' => 'Reto 30 Días Fitness',
            'descripcion' => 'Rutina diaria enfocada en actividad física, disciplina y constancia.',
            'duracion_dias' => 30,
            'user_id' => $admin->id,
            'estado' => 'activo',
        ]);

        $retoDos = Reto::create([
            'nombre' => 'Lectura Diaria',
            'descripcion' => 'Leer al menos 20 minutos al día y registrar avances.',
            'duracion_dias' => 21,
            'user_id' => $admin->id,
            'estado' => 'activo',
        ]);

        $participanteUno = Participante::create([
            'user_id' => $usuario->id,
            'reto_id' => $retoUno->id,
            'progreso' => 45,
            'completado' => false,
            'fecha_inicio' => now()->subDays(10)->toDateString(),
            'fecha_fin' => null,
        ]);

        $participanteDos = Participante::create([
            'user_id' => $usuario->id,
            'reto_id' => $retoDos->id,
            'progreso' => 80,
            'completado' => false,
            'fecha_inicio' => now()->subDays(20)->toDateString(),
            'fecha_fin' => null,
        ]);

        Actividad::create([
            'participante_id' => $participanteUno->id,
            'descripcion' => 'Caminata de 30 minutos y rutina de estiramiento.',
            'fecha' => now()->subDays(2)->toDateString(),
        ]);

        Actividad::create([
            'participante_id' => $participanteUno->id,
            'descripcion' => 'Sesión de entrenamiento de fuerza.',
            'fecha' => now()->subDay()->toDateString(),
        ]);

        Actividad::create([
            'participante_id' => $participanteDos->id,
            'descripcion' => 'Lectura del capítulo 3 del libro asignado.',
            'fecha' => now()->subDays(3)->toDateString(),
        ]);
    }
}
