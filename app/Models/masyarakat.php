<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class masyarakat extends Model
{
    use  HasFactory, Notifiable;

    protected $table = 'masyarakats';

    protected $fillable = [
        'password',
        'username',
    ];

   
    protected $hidden = [
        'password',
    ];

   
    protected $primaryKey = 'id';

    public function nik()
    {
        return $this->hasMany('App\Models\pengaduan');
    }
}
