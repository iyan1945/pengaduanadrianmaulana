<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $table='pengaduans';

protected $fillable = [

    'tgl_pengaduan',
    'isi_laporan',
    'status',
];

    public function masyarakat()
    {
        return $this->BelongsTo('App\Models\masyarakat');
    }
}