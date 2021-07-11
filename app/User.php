<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname', 'email', 'password',
    ];

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
    public  function sobe(){
    return $this->belongsToMany(Soba::class,'rezervacije')->withPivot(['datum_rezervacije','broj_nocenja','id'])->withTimestamps();
    }

    public  function uslugehotela(){
        return $this->belongsToMany(UslugeHotela::class,'userusluge')->withTimestamps();
    }

    public  function minibars(){
        return $this->belongsToMany(Minibar::class,'userminibar')->withTimestamps();
    }

}
