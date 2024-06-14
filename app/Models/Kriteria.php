<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'sys_name',
        'bobot',
        'jenis',
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
