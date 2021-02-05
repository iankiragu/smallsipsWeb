<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $guarded = [];
    protected $table = 'towns';

    public function hospitals(){
        return $this->hasMany(Hospital::class,'town_id','id');
    }
}
