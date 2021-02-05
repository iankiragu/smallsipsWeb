<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'hospitals';

    public function users(){
        return $this->hasMany(User::class,'hospital_id','id');
    }
    public function towns(){
        return $this->belongsTo(Town::class,'id','town_id');
    }
}
