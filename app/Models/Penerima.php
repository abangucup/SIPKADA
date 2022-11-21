<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'alamat',
        'kelurahan_id',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }
}
