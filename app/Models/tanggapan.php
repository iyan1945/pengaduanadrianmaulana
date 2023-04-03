<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    protected $fillable = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_user',
    ];
    public function masyarakat()
    {
        return $this->BelongsTo('App\Models\masyarakat');
    }

    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }
}
