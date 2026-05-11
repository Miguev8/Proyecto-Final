<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participante extends Model
{
    protected $fillable = [
        'user_id',
        'reto_id',
        'progreso',
        'completado',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected function casts(): array
    {
        return [
            'progreso' => 'integer',
            'completado' => 'boolean',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reto(): BelongsTo
    {
        return $this->belongsTo(Reto::class);
    }

    public function actividades(): HasMany
    {
        return $this->hasMany(Actividad::class);
    }
}
