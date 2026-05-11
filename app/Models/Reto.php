<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion_dias',
        'user_id',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'duracion_dias' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participantes(): HasMany
    {
        return $this->hasMany(Participante::class);
    }
}
