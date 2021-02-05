<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;


/**
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class,'hospital_id','id');
    }

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }

    public function patient_appointments(){
        return $this->hasMany(Appointment::class,'user_id','id');
    }

    public function doctor_appointments(){
        return $this->hasMany(Appointment::class,'doctor_id','id');
    }
}
