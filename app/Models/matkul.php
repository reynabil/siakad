<?php

namespace App\Models;

use App\Models\krs;
use App\Models\jadwaldosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class matkul extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function krs(){
        $this->hasMany(krs::class);
    }
    public function khs(){
        $this->hasMany(khs::class);
    }
    public function jadwaldosen(){
        $this->hasMany(jadwaldosen::class ,'matkul','id');
    }
}
