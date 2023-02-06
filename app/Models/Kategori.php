<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($kategori) {
            $kategori->kriteria()->detach();
        });
    }

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'kategori_kriteria');
    }
}
