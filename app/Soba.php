<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soba extends Model
{
    protected $fillable = ['broj_sobe','broj_kreveta','cena_sobe'];
    protected $table = 'soba';
    public function users(){
        return $this->belongsToMany(User::class,'rezervacije')->withTimestamps();
    }




}
