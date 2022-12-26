<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class krs extends Model
{
    use HasFactory;
    protected $guarded = [];

public function mahasiswas(){
    return $this->belongsTo(Admin::class, 'id_namamahasiswa','id');
}
public function matkuls(){
    return $this->belongsTo(Matkul::class, 'id_matkul','id');
}
    public function jurusans(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan','id');
    }


}
