<?php

namespace App\Models;

use App\Models\jadwaldosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ruang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwaldosen(){
        $this->hasMany(Jadwaldosen::class);
    }
}
