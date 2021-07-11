<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uslugehotela extends Model
{
    protected $table = 'uslugehotela';
    public  function users(){
        return $this->belongsToMany(User::class,'userusluge')->withTimestamps();
    }
}
