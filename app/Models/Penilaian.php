<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif_id',
        'kriteria_id',
        'sub_kriteria_id',
    ];

    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class);
    }
}
