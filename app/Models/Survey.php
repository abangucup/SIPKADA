<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_kriteria_id',
        'penerima_id'
    ];

    public function sub()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class);
    }
}
