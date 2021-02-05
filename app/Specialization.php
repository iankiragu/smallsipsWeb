<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
//    use SoftDeletes;
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class);
    }
//    public function doctors(){
//        return $this->hasMany(User::class,'id');
//    }
}
