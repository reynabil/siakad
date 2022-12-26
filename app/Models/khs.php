<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswas(){
        return $this->belongsTo(Admin::class, 'id_namamahasiswa','id');
    }
    public function matkuls(){
        return $this->belongsTo(Matkul::class, 'id_matkul','id');
    }
}
