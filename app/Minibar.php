<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minibar extends Model
{
protected $table = 'minibar';

    public function users(){
        return $this->belongsToMany(User::class,'userminibar')->withTimestamps();
    }
}
