<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function penerima()
    {
        return $this->hasMany(Penerima::class);
    }
    
}
