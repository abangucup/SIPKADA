<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'penerima_id', 
        'subkriteria_id',
        'nilai',
        'hitung',
        'utility'
    ];

    public function penerima()
    {
        return $this->belongsTo(Penerima::class);
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class);
    }
}
