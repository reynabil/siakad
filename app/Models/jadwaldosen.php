<?php

namespace App\Models;

use App\Models\dosen;
use App\Models\ruang;
use App\Models\matkul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jadwaldosen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosens(){
        return $this->belongsTo(Dosen::class, 'id_namadosen','id');
    }
    public function ruangs(){
        return $this->belongsTo(Ruang::class, 'koderuang','id');
    }
    public function matkuls(){
        return $this->belongsTo(Matkul::class, 'id_matkul','id');
    }
}
