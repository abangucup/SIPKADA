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
        'kriteria',
        'bobot',
    
    ];

    public function survey()
    {
        return $this->belongsToThrough(Survey::class, Subkriteria::class);
    }

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class)->orderByDesc('subbobot');
    }

    public function penerima()
    {
        return $this->belongsToThrough(Penerima::class, Survey::class, Subkriteria::class);
    }

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_kriteria');
    }
}
