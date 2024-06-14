<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pendidikan',
        'sertifikat',
        'kemampuan',
        'penggunaan_teknologi',
        'penggunaan_tools',
        'infrakstruktur',
    ];

    // protected $hidden = [
    //     'user_id',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sub(): HasMany
    {
        return $this->hasMany(SubKriteria::class);
    }
}
