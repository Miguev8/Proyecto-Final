<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'participante_id',
        'descripcion',
        'fecha',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function participante(): BelongsTo
    {
        return $this->belongsTo(Participante::class);
    }
}
