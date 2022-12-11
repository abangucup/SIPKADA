<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Penerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'alamat',
        'kelurahan_id',
        'rangking'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function survey()
    {
        return $this->hasMany(Survey::class);
    }

    public function subkriteria()
    {
        return $this->hasManyThrough(Subkriteria::class, Survey::class);
    }

    public function kriteria()
    {
        return $this->hasManyThrough(Kriteria::class, Subkriteria::class, Survey::class);
    }
}
