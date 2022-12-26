<?php

namespace App\Models;

use App\Models\krs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function krs()
    {
        $this->hasMany(krs::class, 'nama_mahasiswa', 'id');
    }
    public function khs()
    {
        $this->hasMany(khs::class, 'id_namamahasiswa', 'id');
    }

    public function jurusans(){
        $this->belongsTo(Jurusan::class, 'jurusan','id' );
    }
}
