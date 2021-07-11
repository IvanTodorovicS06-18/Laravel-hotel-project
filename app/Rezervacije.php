<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rezervacije extends Pivot
{
    protected $fillable = ['user_id', 'soba_id','datum_rezervacije','broj_nocenja'];
}
