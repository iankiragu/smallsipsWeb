<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function patients(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function doctors(){
        return $this->belongsTo(User::class,'id','id');
    }
}
