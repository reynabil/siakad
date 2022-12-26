<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function krs()
    {
        $this->hasMany(krs::class, 'jurusan', 'id');
    }


    public function admins(){
        $this->hasMany(admin::class, 'jurusan','id');
    }
}
