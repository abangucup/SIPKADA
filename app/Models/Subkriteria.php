<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Relations\BelongsToThrough;

class Subkriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_id',
        'sub',
        'bobot'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function penerima()
    {
        return $this->belongsToThrough(Survey::class, Penerima::class);
    }

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }
}
