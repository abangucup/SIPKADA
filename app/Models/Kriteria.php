<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Relations\BelongsToThrough;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'bobot',
        'keterangan',
        'jenis',
    ];

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class)->orderByDesc('bobot');
    }

    // public function penerima()
    // {
    //     return $this->belongsToThrough(Subkriteria::class, Survey::class, Penerima::class);
    // }
}
