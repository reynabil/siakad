<?php

namespace App\Models;

use App\Models\matkul;
use App\Models\jadwaldosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dosen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwaldosen(){
        return $this->hasMany(jadwaldosen::class);
    }
}
