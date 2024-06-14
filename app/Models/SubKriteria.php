<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_id',
        'nama',
        'nilai',
    ];

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }
}
