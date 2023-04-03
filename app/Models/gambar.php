<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function gambar()
    {
        return $this->hasMany('App\Models\pengaduan');
    }
}
